<?php

function fix_path($path){
    return str_replace('\\', '/', $path);
}

function timestamp(){
    return date('Y-m-d H:i:s');
}

function get_ip(){
    if (function_exists('apache_request_headers')) {
        $headers = apache_request_headers();
    } else {
        $headers = $_SERVER;
    }
    if (array_key_exists('X-Forwarded-For', $headers) && filter_var($headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $IP = $headers['X-Forwarded-For'];
    } else if (array_key_exists('HTTP_X_FORWARDED_FOR', $headers) && filter_var($headers['X-HTTP_X_FORWARDED_FOR-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $IP = $headers['HTTP_X_FORWARDED_FOR'];
    } else {
        $IP = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    return $IP;
}