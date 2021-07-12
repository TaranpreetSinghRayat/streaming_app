<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 10-07-2021
 * Time: 11:41
 */

include '../config/config.php';
?>

<?php
//  ADMIN MIDDLE WARE
if(!\App\Session::exists('isLoggedIn') || \App\Session::get('role') != 'Administrator'){
    if(($_SERVER['SCRIPT_NAME'] != '/admin/login.php')){
        header('Location: login.php');
    }
}

if(isset($_GET['logout'])){
    $user = new \App\Users();
    if($user->logout()){
        header("Refresh:0");
    }
}
$USER = new \App\Users();

$USR_DATA = $USER->find(\App\Session::get('UID')) ?? null;