<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 15:12
 */

namespace App;


class Session
{
    /**
     *
     * @param type $key
     * @return type
     */
    public static function exists($key) {
        return (isset($_SESSION[$key])) ? true : false;
    }

    /**
     *
     * @param type $key
     * @param type $val
     * @return string
     */
    public static function insert($key, $val) {
        return $_SESSION[$key] = $val;
    }

    /**
     *
     * @param type $key
     * @return string
     */
    public static function get($key) {
        if(self::exists($key)){
            return $_SESSION[$key];
        }
        return false;
    }

    /**
     *
     * @param type $key
     */
    public static function del($key) {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     *
     * @param type $key
     * @param type $val
     * @return string
     */
    public static function flash($key, $val = '') {
        if (self::exists($key)) {
            $session = self::get($key);
            self::del($key);
            return $session;
        } else {
            self::insert($key, $val);
        }
    }

}