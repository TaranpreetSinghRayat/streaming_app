<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 10-07-2021
 * Time: 11:41
 */

include '../config/config.php';
?>

<?php
//check if user was logged in as other user or not and then reset it back if its logged in as other user.
if(\App\Session::exists('O_UID')){
    \App\Session::insert('UID', \App\Session::get('O_UID'));
    \App\Session::del('O_UID');
    \App\Session::insert('role', \App\Session::get('O_role'));
    \App\Session::del('O_role');
}

//  ADMIN MIDDLE WARE
if(!\App\Session::exists('isLoggedIn') || \App\Session::get('role') != 'Administrator'){
    if(($_SERVER['SCRIPT_NAME'] != '/admin/login.php')){
        if(\App\Session::exists('isLoggedIn')){
            header('Location: '. BASE_URL .'');
        }else{
            header('Location: login.php');
        }
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
