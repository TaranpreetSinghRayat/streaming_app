<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 24-06-2021
 * Time: 19:34
 */

include "./config/config.php";

?>

<!-- Header Section -->
<?php
if(!\App\Session::exists('isLoggedIn')){
    header('Location: login.php');
}

if(isset($_GET['logout'])){
    $user = new \App\Users();
    if($user->logout()){
        header("Refresh:0");
    }
}

$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
echo $TPL->render('include/header',[
    'page_description' => 'Please login to watch all your favorite shows and movies.',
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Home | '. APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);
$PAGES = new \App\Pages();
?>
<!-- // Header Section -->
<!-- Navigation Section -->
<?php
echo $TPL->render('include/nav',[
        'app_name' => \App\Settings::get_value('app.name'),
        'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
        'nav_links' => $PAGES->get_pages(($PAGES->get_page_header('navi'))['id'])
]);
?>
<!-- //Navigation Section -->

<!-- Body Section -->
<?php
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();

//check for search request
if(isset($_GET['s'])){
    $search = \App\Security::clean($_GET['s']);
    echo $TPL->render('search/index',[
        'titles' => $ENTITIES->search($search),
        'title' => $search,
        'ENTITIES' => $ENTITIES,
        'GENRE' => $GENRE,
        'CASTS' => $CASTS,
        'TAGS' => $TAGS
    ]);
}else{
    echo $TPL->render('home/index',[
        'ENTITIES' => $ENTITIES,
        'GENRE' => $GENRE,
        'CASTS' => $CASTS,
        'TAGS' => $TAGS
    ]);
}
?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[
        'app_description' => \App\Settings::get_value('app.description'),
        'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
        'gen_list' => $GENRE->list(),
        'company_pages' => $PAGES->get_pages(($PAGES->get_page_header('company'))['id'])
]);
?>
<!-- //Footer Section -->
<!-- Custom Script -->

<!-- //Custom Script -->