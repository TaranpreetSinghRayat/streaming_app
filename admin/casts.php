<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 14-07-2021
 * Time: 12:01
 */

include 'config.php';
$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.admin.theme'));
?>

<!-- Header Section -->
<?php
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();


echo $TPL->render('include/header',[
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Casts | '. APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);
?>
<!-- // Header Section -->

    <!-- Navigation Section -->
    <?php
    echo $TPL->render('include/nav',[
        'app_name' => \App\Settings::get_value('app.name'),
        'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
        'ENTITIES' => $ENTITIES,
        'GENRE' => $GENRE,
        'CASTS' => $CASTS,
        'TAGS' => $TAGS,
        'USER' => $USER,
        'USR' => $USR_DATA
    ]);

    echo $TPL->render('casts/view', [
        'app_name' => \App\Settings::get_value('app.name'),
        'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
        'ENTITIES' => $ENTITIES,
        'GENRE' => $GENRE,
        'CASTS' => $CASTS,
        'TAGS' => $TAGS,
        'USER' => $USER,
        'USR' => $USR_DATA
    ]);
    ?>
    <!-- //Navigation Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[
    'app_name' => \App\Settings::get_value('app.name'),
    'USR' => $USR_DATA
]);
?>
<!-- //Footer Section -->

<!-- Custom Script -->
<script>
$('#add_new_cast').submit((e) => {
    e.preventDefault();

    console.log('add new cast');
});
</script>
<!-- //Custom Script -->
