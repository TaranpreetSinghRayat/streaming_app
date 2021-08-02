<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 06-07-2021
 * Time: 12:22
 */

include "./config/config.php";

?>

<?php
$PAGES = new \App\Pages();
$PAGE_DATA = $PAGES->get_page_by_slug($_GET['view']);
?>
<!-- Header Section -->
<?php if(!empty($PAGE_DATA)): ?>
    <?php
    if($PAGE_DATA['isLoggedIn'] == 1):
        if(!\App\Session::exists('isLoggedIn')){
            header('Location: login.php');
            exit();
        }
    endif;
    $TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
    echo $TPL->render('include/header',[
        'page_description' => $PAGE_DATA['content'],
        'app_auth' => $_ENV['DEV'],
        'page_title' => $PAGE_DATA['title'] . ' | '. APP_NAME,
        'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
    ]);
    $ENTITIES = new \App\Entities();
    $GENRE = new \App\Genre();
    $CASTS = new \App\Casts();
    $TAGS = new \App\Tags();
    ?>
<!-- //Header Section -->
    <!-- Navigation Section -->
    <?php
    if($PAGE_DATA['isLoggedIn'] == 1):
        echo $TPL->render('include/nav',[
            'app_name' => \App\Settings::get_value('app.name'),
            'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
            'nav_links' => $PAGES->get_pages(($PAGES->get_page_header('navi'))['id'])
        ]);
    else:
        echo $TPL->render('include/nav2',[
            'app_name' => \App\Settings::get_value('app.name'),
            'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
            'nav_links' => $PAGES->get_pages(($PAGES->get_page_header('navi'))['id'])
        ]);
    endif;

    ?>
    <!-- //Navigation Section -->

    <!-- Body Section -->
    <?php
    echo $TPL->render('page/index',[
        'ENTITIES' => $ENTITIES,
        'GENRE' => $GENRE,
        'CASTS' => $CASTS,
        'TAGS' => $TAGS,
        'title' => $PAGE_DATA['title'],
        'page_data' => $PAGE_DATA
    ]);
    ?>
    <!-- //Body Section -->

<?php endif; ?>
<!-- Footer Section -->
<?php
$PAGES = new \App\Pages();
echo $TPL->render('include/footer',[
    'app_description' => \App\Settings::get_value('app.description'),
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
    'gen_list' => $GENRE->list(),
    'company_pages' => $PAGES->get_pages(($PAGES->get_page_header('company'))['id'])
]);
?>
<!-- //Footer Section -->
