<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 17:39
 */

namespace App;


class Security
{

    public static function encrypt(string $string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = ENC_KEY;
        $secret_iv = ENC_KEY;
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public static function decrypt(string $string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = ENC_KEY;
        $secret_iv = ENC_KEY;
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }

    public static function password_strength(string $pass)
    {
        $upper = 0;
        $lower = 0;
        $number = 0;
        $special = 0;
        for ($i = 0; $i < strlen($pass); $i++) {
            if (
                $pass[$i] >= 'A' &&
                $pass[$i] <= 'Z'
            )
                $upper++;
            else if (
                $pass[$i] >= 'a' &&
                $pass[$i] <= 'z'
            )
                $lower++;
            else if (
                $pass[$i] >= '0' &&
                $pass[$i] <= '9'
            )
                $number++;
            else
                $special++;
        }

        if ($upper != 0 && $lower != 0 && $number != 0 && $special != 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function clean($str)
    {
        $str = trim($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    public static function filter($str,$opt = 'string')
    {
        switch ($opt){
            case 'int':
                if (filter_var($str, FILTER_VALIDATE_INT) === 0 || !filter_var($str, FILTER_VALIDATE_INT) === false) {
                    return $str;
                }
                return false;
                break;
            case 'ip':
                if (!filter_var($str, FILTER_VALIDATE_IP) === false) {
                    return $str;
                }
                return false;
                break;
            case 'email':
                if (!filter_var(filter_var($str, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL) === false) {
                    return filter_var($str, FILTER_SANITIZE_EMAIL);
                }
                return false;
                break;
            case 'url':
                if (!filter_var(filter_var($str, FILTER_SANITIZE_URL), FILTER_VALIDATE_URL) === false) {
                    return filter_var($str, FILTER_SANITIZE_URL);
                }
                return false;
                break;
            default:
                return filter_var($str,FILTER_SANITIZE_STRING);
                break;
        }
    }
}