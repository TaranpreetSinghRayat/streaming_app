<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 30-06-2021
 * Time: 16:12
 */

namespace App;


class File
{

    public static function get_duration(string $file)
    {
        $getID3 = new \getID3();
        $info = $getID3->analyze($file);
        $getID3 = null;
        return $info['playtime_string'];
    }

    public static function get_mime(string $file)
    {
        $getID3 = new \getID3();
        $info = $getID3->analyze($file);
        $getID3 = null;
        return $info['fileformat'];
    }

    public static function get_audio_channels(string $file)
    {
        $getID3 = new \getID3();
        $info = $getID3->analyze($file);
        $getID3 = null;
        return $info['audio']['channels'];
    }

    public static function get_video_resolution(string $file)
    {
        $getID3 = new \getID3();
        $info = $getID3->analyze($file);
        $getID3 = null;
        return $info['video']['resolution_x'] . 'x'. $info['video']['resolution_y'];
    }

    public static function get_video_framerate(string $file)
    {
        $getID3 = new \getID3();
        $info = $getID3->analyze($file);
        $getID3 = null;
        return $info['video']['frame_rate'];
    }

}