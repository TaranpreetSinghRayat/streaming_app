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

    public function get_movies()
    {
        if($result = $this->db->where('isMovie',1)->get(Config::TBL_NAMES['ENTITIES'])){
            return $result;
        }
        return null;
    }

    public function get_shows()
    {
        if($result = $this->db->where('isMovie', 0)->get(Config::TBL_NAMES['ENTITIES'])){
            return $result;
        }
        return null;
    }

    public function get(int $titleID)
    {
        if($result = $this->db
                            ->where(Config::TBL_NAMES['ENTITIES']  . '.id', $titleID)
                            ->join(Config::TBL_NAMES['VIDEOS'],Config::TBL_NAMES['VIDEOS'] . '.entityId = '. Config::TBL_NAMES['ENTITIES'] .'.id', 'left')
                            ->getOne(Config::TBL_NAMES['ENTITIES'])){
            return $result;
        }
        return null;
    }

    public function update_views(int $titleID)
    {
        if(Session::exists('view_title')){
            if(!in_array($titleID, Session::get('view_title'))){
                $old_titles = Session::get('view_title');
                array_push($old_titles, $titleID);
                Session::insert('view_title', $old_titles);
                $old_views = $this->db->where('entityId', $titleID)->getOne(Config::TBL_NAMES['VIDEOS']);
                $new_view = $old_views['views'] + 1;
                if($this->db->where('entityId', $titleID)->update(Config::TBL_NAMES['VIDEOS'],['views' => $new_view])){
                    return true;
                }
            }
        }else{
            Session::insert('view_title',[]);
        }
        return false;
    }

    public function get_total_seasons(int $titleID)
    {
        if($result = $this->db->rawQueryOne("SELECT count(DISTINCT(". Config::TBL_NAMES['VIDEOS'] .".season)) as seasson_count FROM ". Config::TBL_NAMES['ENTITIES'] ." INNER JOIN ". Config::TBL_NAMES['VIDEOS'] ." ON ". Config::TBL_NAMES['VIDEOS'] .".entityId = ". Config::TBL_NAMES['ENTITIES'] .".id WHERE ". Config::TBL_NAMES['ENTITIES'] .".id = ?",[$titleID])
        ){
            return $result['seasson_count'];
        }
        return null;
    }

    public function get_total_episodes(int $titleID)
    {
        if($result = $this->db->rawQueryOne("SELECT count(". Config::TBL_NAMES['VIDEOS'] .".episode) as epi_count FROM ". Config::TBL_NAMES['ENTITIES'] ." INNER JOIN ". Config::TBL_NAMES['VIDEOS'] ." ON ". Config::TBL_NAMES['VIDEOS'] .".entityId = ". Config::TBL_NAMES['ENTITIES'] .".id WHERE ". Config::TBL_NAMES['ENTITIES'] .".id = ?",[$titleID])){
            return $result['epi_count'];
        }
        return null;
    }

    public function get_total_views(int $titleID)
    {
        if($result = $this->db->rawQueryOne("SELECT SUM(". Config::TBL_NAMES['VIDEOS'] .".views) as total_views FROM ". Config::TBL_NAMES['ENTITIES'] ." INNER JOIN ". Config::TBL_NAMES['VIDEOS'] ." ON ". Config::TBL_NAMES['VIDEOS'] .".entityId = ". Config::TBL_NAMES['ENTITIES'] .".id WHERE ". Config::TBL_NAMES['ENTITIES'] .".id = ?",[$titleID])){
            return $result['total_views'];
        }
        return null;
    }

    public function get_show_seasons(int $titleID)
    {
        if($result = $this->db->rawQuery("SELECT DISTINCT(". Config::TBL_NAMES['VIDEOS'] .".season) as total_session
                                                FROM ". Config::TBL_NAMES['ENTITIES'] ."
                                                INNER JOIN ". Config::TBL_NAMES['VIDEOS'] ." ON ". Config::TBL_NAMES['VIDEOS'] .".entityId = ". Config::TBL_NAMES['ENTITIES'] .".id WHERE ". Config::TBL_NAMES['ENTITIES'] .".id = ?
                                                GROUP BY ". Config::TBL_NAMES['VIDEOS'] .".season",[$titleID])){
            return $result;
        }
        return null;
    }

    public function get_show_episodes_by_season(int $seasonID)
    {
        if($result = $this->db
                        ->where(Config::TBL_NAMES['VIDEOS']  . '.season', $seasonID)
                        ->join(Config::TBL_NAMES['VIDEOS'],Config::TBL_NAMES['VIDEOS'] . '.entityId = '. Config::TBL_NAMES['ENTITIES'] .'.id', 'left')
                        ->get(Config::TBL_NAMES['ENTITIES'])
        ){
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