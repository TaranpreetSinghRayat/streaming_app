<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 12-07-2021
 * Time: 14:27
 */

include 'config.php';
?>

<!-- Header Section -->
<?php
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();

$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.admin.theme'));
echo $TPL->render('include/header',[
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Settings | '. APP_NAME,
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

echo $TPL->render('settings/index',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'USR' => $USR_DATA
]);

?>
<!-- //Body Section -->

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
function update_setting(id) {
    var val = $("#_key_" + id).val();
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-setting.php",
        data: {action: "process_update", id: id, val: val},
        dataType: "html",
        beforeSend: function () {
          $("#_key_" + id).prop('disabled',true);
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create("Settings Updated", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }

        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {
            $("#_key_" + id).prop('disabled',false);
        }
    });
}

</script>
<!-- //Custom Script -->

