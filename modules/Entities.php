<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 25-06-2021
 * Time: 17:38
 */

namespace App;


class Entities
{

    var $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function get_most_viewed()
    {
        $most_viewed = $this->db->getValue(Config::TBL_NAMES['ENTITIES'], "MAX(views)");
        if($result = $this->db->where('views', $most_viewed)->getOne(Config::TBL_NAMES['ENTITIES'])){
            return $result;
        }
        return null;
    }

    /**
     * CRUD OPERATIONS
     */

    public function add(array $data = [])
    {
        if($this->db->insert(Config::TBL_NAMES['ENTITIES'],$data)){
            return $this->db->getLastInsertId();
        }
        return false;
    }

}