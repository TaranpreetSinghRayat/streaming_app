<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 14:00
 */

namespace App;


class Settings
{

    public static function get_value(string $key)
    {
        $db = \PDODb::getInstance();
        $setting_val = $db->where('name', $key)->where('status',1)->getOne(Config::TBL_NAMES['SETTINGS']);
        return $setting_val['value'];
    }

    public static function get_key(string $value)
    {
        $db = \PDODb::getInstance();
        $setting_key = $db->where('value', $value)->where('status',1)->getOne(Config::TBL_NAMES['SETTINGS']);
        return $setting_key['name'];
    }

    public static function get_by_type(string $type)
    {
        $db = \PDODb::getInstance();
        $setting_type = $db->rawQuery('select * from '.Config::TBL_NAMES['SETTINGS'].' where name LIKE "%'.$type.'%" and status <> 0');
        return $setting_type;
    }

    public static function get_all()
    {
        $db = \PDODb::getInstance();
        $all_settings = $db->get(Config::TBL_NAMES['SETTINGS']);
        return $all_settings;
    }

    public static function get_id_by_key(string $key)
    {
        $db = \PDODb::getInstance();
        $setting_val = $db->where('name', $key)->where('status',1)->getOne(Config::TBL_NAMES['SETTINGS']);
        return $setting_val['id'];
    }

    public static function create(array $data)
    {
        $db = \PDODb::getInstance();
        if($db->insert(Config::TBL_NAMES['SETTINGS'],$data)){
            return $db->getLastInsertId();
        }
        return $db->getLastError();
    }

    public static function update(int $id = null,array $data = [])
    {
        $db = \PDODb::getInstance();
        if($db->where('id', $id)->update(Config::TBL_NAMES['SETTINGS'],$data)){
            return true;
        }
        return false;
    }

    public static function delete(int $id = null)
    {
        $db = \PDODb::getInstance();
        if($db->where('id', $id)->delete(Config::TBL_NAMES['SETTINGS'])){
            return true;
        }
        return false;
    }

}