<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 06-07-2021
 * Time: 12:22
 */

namespace App;


class Pages
{

    var $db = null;

    function __construct()
    {
        $this->db = \PDODb::getInstance();
    }

    public function get_pages(int $page_head)
    {
        if($result = $this->db->where('headerID', $page_head)->where('status', 1)->get(Config::TBL_NAMES['PAGES'])){
            return $result;
        }
        return null;
    }

    public function get_page_header(string $head)
    {
        if($result = $this->db->rawQueryOne("SELECT * FROM `page_headers` WHERE name LIKE \"%{$head}%\" ")){
            return $result;
        }
        return null;
    }

    public function get_page_by_slug(string $pageSlug)
    {
        if($result = $this->db->where('slug', $pageSlug)->getOne(Config::TBL_NAMES['PAGES'])){
            return $result;
        }
        return null;
    }

}