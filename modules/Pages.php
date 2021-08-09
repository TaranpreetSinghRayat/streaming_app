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

    public function list_all()
    {
        if($result = $this->db->get(Config::TBL_NAMES['PAGES'])){
            return $result;
        }
        return null;
    }

    public function get_head_name(int $headID)
    {
        if($result = $this->db->where('id',$headID)->getOne(Config::TBL_NAMES['PAGE_HEADERS'])){
            return $result['name'];
        }
        return null;
    }

    public function list_all_page_headers()
    {
        if($result = $this->db->get(Config::TBL_NAMES['PAGE_HEADERS'])){
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
        if($this->db->insert(Config::TBL_NAMES['PAGES'],$data)){
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
        if($this->db->where('id', $id)->update(\App\Config::TBL_NAMES['PAGES'],$data)){
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
        if($this->db->where('id', $id)->delete(\App\Config::TBL_NAMES['PAGES'])){
            return true;
        }
        return false;
    }

}