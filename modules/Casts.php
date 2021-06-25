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

    }
}