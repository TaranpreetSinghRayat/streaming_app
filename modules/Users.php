<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 23-06-2021
 * Time: 13:35
 */

namespace App;


class Users
{

    private $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function find(string $user)
    {
        if(is_numeric($user)){
            $userID = Security::filter($user,'int');
            if($usr_data = $this->db->where('id',$userID)->getOne(Config::TBL_NAMES['USERS'])){
                return $usr_data;
            }
        }elseif ($userEmail = Security::filter($user,'email')){
            if($usr_data = $this->db->where('email', $userEmail)->getOne(Config::TBL_NAMES['USERS'])){
                return $usr_data;
            }
        }else{
            if($usr_data = $this->db->where('username', $user)->getOne(Config::TBL_NAMES['USERS'])){
                return $usr_data;
            }
        }
        return false;
    }

    public function find_by_key(string $key)
    {
        $user = $this->db->where('account_key', $key)->getOne(Config::TBL_NAMES['USERS']);
        if(!empty($user)){
            return $user;
        }
        return false;
    }

    public function activate(string $key)
    {
        if($this->db->where('account_key',$key)->update(Config::TBL_NAMES['USERS'],
            [
                'status' => 1,
                'account_key' => generate_account_key(),
                'ip' => get_ip()
            ]
        )){
            return true;
        }
        return false;
    }

    public function login(string $user,string $pass)
    {
        $user_data = $this->find($user);
        if(!empty($user_data)){
            if($user_data['password'] == Security::encrypt($pass)){
                if($user_data['status'] != 0){
                    Session::insert('UID', $user_data['id']);
                    Session::insert('isLoggedIn',true);
                    if($user_data['is_subscribed'] == 0){
                        Session::insert('isSubscribed', false);
                    }else{
                        Session::insert('isSubscribed', true);
                    }
                    Session::insert('role', (($user_data['role'] == 0)) ? 'Subscriber' : 'Administrator' );
                    Session::insert('view_title', []);
                    return true;
                }else{
                    Session::insert('USR_ERR',MSG::AUTH['USR_LOG_DEC']);
                }
            }else{
                Session::insert('USR_ERR',MSG::AUTH['USR_LOG_INV_PASS']);
            }
        }else{
            Session::insert('USR_ERR',MSG::AUTH['USR_LOG_NF']);
        }
        return false;
    }

    public function logout()
    {
        Session::del('isLoggedIn');
        $this->update(Session::get('UID'), ['ip' => get_ip()]);
        Session::del('UID');
        Session::del('role');
        Session::del('isSubscribed');
        session_destroy();
        return true;
    }

    public function change_token_event(int $id, int $min)
    {
        $acc_key = generate_account_key();
        /*
         * $this->db->rawQueryOne("CREATE EVENT IF NOT EXISTS update_user_token
            ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL ".$min." MINUTE
            ON COMPLETION PRESERVE
            DO
                call netflix_clone.update_user_token(". $id .", '".$acc_key."')
                select 1;");
        */
        $GLOBALS['pdo']->exec("CREATE EVENT IF NOT EXISTS update_user_token_". $id ." 
            ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL ".$min." MINUTE
            DO
                call netflix_clone.update_user_token(". $id .", '".$acc_key."');");
        return true;
    }
    /**
     * CRUD OPERATIONS
     */

    /**
     * @param array $data
     * @return int|null
     */
    public function add(array $data = [])
    {
        if($this->db->insert(Config::TBL_NAMES['USERS'],$data)){
            return $this->db->getLastInsertId();
        }
        return null;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id,array $data)
    {
        if($this->db->where('id', $id)->update(Config::TBL_NAMES['USERS'],$data)){
            return true;
        }
        return false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        if($this->db->where('id', $id)->delete(Config::TBL_NAMES['USERS'])){
            return true;
        }
        return false;
    }

}