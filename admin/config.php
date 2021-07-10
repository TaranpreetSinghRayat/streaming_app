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
    header('Location: login.php');
}
