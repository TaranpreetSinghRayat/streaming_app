<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 25-06-2021
 * Time: 18:05
 */

namespace App;


class Tags
{
    var $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function get_name_by_id(int $tagID)
    {
        if($tag_data = $this->db->where('id', $tagID)->getOne(Config::TBL_NAMES['TAGS'])){
            return $tag_data['name'];
        }
        return null;
    }

    public function get_by_id(int $id)
    {
        if($result = $this->db->where('id', $id)->getOne(Config::TBL_NAMES['TAGS'])){
            return $result;
        }
        return null;
    }

    public function list_all()
    {
        if($result = $this->db->get(Config::TBL_NAMES['TAGS'])){
            return $result;
        }
        return null;
    }

    /**
     * @param array $data
     * @return int|null
     */
    public function add(array $data = [])
    {
        if($this->db->insert(Config::TBL_NAMES['TAGS'],$data)){
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
        if($this->db->where('id', $id)->update(\App\Config::TBL_NAMES['TAGS'],$data)){
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
        if($this->db->where('id', $id)->delete(\App\Config::TBL_NAMES['TAGS'])){
            return true;
        }
        return false;
    }

}