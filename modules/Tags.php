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
}