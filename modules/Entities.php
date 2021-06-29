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
        if ($result = $this->db->where('views', $most_viewed)->getOne(Config::TBL_NAMES['ENTITIES'])) {
            return $result;
        }
        return null;
    }

    public function get_high_raited()
    {
        $high_raited = $this->db->getValue(Config::TBL_NAMES['ENTITIES'], 'MAX(IMDB)');
        if ($result = $this->db->where('IMDB', $high_raited)->getOne(Config::TBL_NAMES['ENTITIES'])) {
            return $result;
        }
        return null;
    }

    public function get_featured()
    {
        if($featured = $this->db->where('featured', 1)->get(Config::TBL_NAMES['ENTITIES'])){
            return $featured;
        }
        return null;
    }

    public function get_by_genre(int $genID)
    {
        $all_titles = $this->db->get(Config::TBL_NAMES['ENTITIES']);
        $result = [];
        foreach ($all_titles as $title)
        {
            $genre_arr = json_decode($title['genre'], true);
            if(in_array($genID, $genre_arr)){
                $result[] = $title;
            }
        }
        return $result;
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