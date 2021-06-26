<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 25-06-2021
 * Time: 18:05
 */

namespace App;


class Genre
{
    var $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function get_name_by_id(int $genID)
    {
        if($gen_data = $this->db->where('id', $genID)->getOne(Config::TBL_NAMES['GENRE'])){
            return $gen_data['name'];
        }
        return null;
    }
}