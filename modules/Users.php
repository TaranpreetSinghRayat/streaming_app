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