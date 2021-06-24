<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 24-06-2021
 * Time: 19:34
 */

include "./config/config.php";

?>
<?php
if(!\App\Session::exists('isLoggedIn')){
    header('Location: login.php');
}
?>

<?php
if(isset($_GET['logout'])){
    $user = new \App\Users();
    if($user->logout()){
        header("Refresh:0");
    }
}
?>

<a href="<?= BASE_URL . 'home.php?logout' ?>">Logout</a>