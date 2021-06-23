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