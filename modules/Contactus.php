<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 05-07-2021
 * Time: 13:40
 */

namespace App;


class Contactus
{

    var $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function add(array $data = [])
    {
        if($this->db->insert(Config::TBL_NAMES['CONTACT'],$data)){
            return $this->db->getLastInsertId();
        }
        return false;
    }

}