<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 12:53
 */
session_start();
define('APP_ROOT',dirname(__DIR__) . '/');
//Load helpers
$helper_dir = APP_ROOT . "helper/";

foreach (scandir($helper_dir) as $file) {
    if ($file !== '.' && $file !== '..') {
        include_once $helper_dir . $file;
    }
}

//Load composer
require_once APP_ROOT.'vendor/autoload.php';

define('ASSETS_ROOT',APP_ROOT."assets");
define('TEMPLATE', APP_ROOT."template");

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

/**
 * Creating Database Connection
 */

$pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DB']}", $_ENV['DB_USER'],$_ENV['DB_PASS'],[
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
]);
$GLOBALS['pdo'] = $pdo;
$DB = new \PDODb($pdo);
/**
 * Load Settings
 */
define('APP_VER',\App\Settings::get_value('app.version'));
define('APP_NAME',\App\Settings::get_value('app.name'));
define('ENC_KEY',$_ENV['ENC_INV']); //Random Encryption key
define('BASE_URL',$_ENV['BASE_URL']);
define('BASE_URL_ADMIN',$_ENV['BASE_URL'] . ''. $_ENV['BASE_URL_ADMIN'] .'/');
define('BASE_URL_ASSETS',$_ENV['BASE_URL'] . 'assets/'.\App\Settings::get_value('app.theme').'/');
define('BASE_ASSETS','assets/'.\App\Settings::get_value('app.theme').'/');
define('CAST_ASSETS','../assets/cast/');
define('ENTITIES_ASSETS', '../assets/entities/');
define('VIDEO_ASSETS', '../assets/videos/');
define('AVATAR_ASSETS', '../assets/avatars/');
define('ADMIN_BASE_URL_ASSETS',$_ENV['BASE_URL'] . 'assets/'.\App\Settings::get_value('app.admin.theme').'/');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
define('CURRENT_LINK',$actual_link);