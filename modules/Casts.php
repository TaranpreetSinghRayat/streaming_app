<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 25-06-2021
 * Time: 18:05
 */

namespace App;


class Casts
{
    var $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function get_by_id(int $castID)
    {
        if($cast_data = $this->db->where('id', $castID)->getOne(Config::TBL_NAMES['CASTS'])){
            return $cast_data;
        }
        return null;
    }

    public function get_all()
    {
        if($result = $this->db->get(Config::TBL_NAMES['CASTS'])){
            return $result;
        }
        return null;
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
        if($this->db->insert(Config::TBL_NAMES['CASTS'],$data)){
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
        if($this->db->where('id', $id)->update(\App\Config::TBL_NAMES['CASTS'],$data)){
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
        if($this->db->where('id', $id)->delete(\App\Config::TBL_NAMES['CASTS'])){
            return true;
        }
        return false;
    }
}