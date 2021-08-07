<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 20-07-2021
 * Time: 14:29
 */

namespace App;


class Updator
{

    public function check_latest_ver()
    {
        //call to mirror and read version file
        $latest_version = parse_ini_string(file_get_contents(\App\Settings::get_value('updator.mirror') .'/version.ini'));
        if($latest_version['CURRENT'] > \App\Settings::get_value('app.version')){
            \App\Session::insert('update_msg', $latest_version['MESSAGE']);
            return 1;
        }else{
            return 0;
        }
    }

    public function get_latest_ver()
    {
        $latest_version = parse_ini_string(file_get_contents(\App\Settings::get_value('updator.mirror') .'/version.ini'));
        if($latest_version['CURRENT'] > \App\Settings::get_value('app.version')){
            return $latest_version['CURRENT'];
        }else{
            return 0;
        }
    }

}