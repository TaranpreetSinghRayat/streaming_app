<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 20-07-2021
 * Time: 11:53
 */

include 'config.php';
?>

<!-- Header Section -->
<?php
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();
$UPD = new \App\Updator();

$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.admin.theme'));
echo $TPL->render('include/header',[
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'App Updator | '. APP_NAME,
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
?>
<!-- //Navigation Section -->

<!-- Body Section -->
<?php
echo $TPL->render('updator/index',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'USER' => $USER,
    'USR' => $USR_DATA,
    'UPD' => $UPD
]);
?>
<!-- // Body Section -->
<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[
    'app_name' => \App\Settings::get_value('app.name'),
    'USR' => $USR_DATA
]);
?>
<!-- //Footer Section -->

<!-- Custom script -->
<script>
function check_for_update() {
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-updator.php",
        data: {action: "process_check_update"},
        dataType: "html",
        beforeSend: function () {
            $('.avail_version').html('Please wait checking for latest version.');
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);

            if(parsed_data.status == 1){
                $('.avail_version').html(parsed_data.msg);
                $('.updt_btn').css('display','inline');
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {

        }
    });
}
</script>
<!-- //Custom Script -->

