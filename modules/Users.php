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

    public function add(array $data = [])
    {
        if($this->db->insert(Config::TBL_NAMES['USERS'],$data)){
            return $this->db->getLastInsertId();
        }
        return null;
    }

    public function update(int $id,array $data)
    {
        if($this->db->where('id', $id)->update(Config::TBL_NAMES['USERS'],$data)){
            return true;
        }
        return false;
    }

    public function delete(int $id)
    {
        if($this->db->where('id', $id)->delete(Config::TBL_NAMES['USERS'])){
            return true;
        }
        return false;
    }

}