<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 29-07-2021
 * Time: 16:28
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
    'page_title' => 'Users | '. APP_NAME,
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
echo $TPL->render('users/view', [
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
<!-- //Body Secrtion -->

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
$('.gen_password').click(function(){
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action: "process_generate_password",
        },
        dataType: "html",
        beforeSend: function () {

        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                $('form#add_user_frm input[name=password]').val(parsed_data.msg);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {

        }
    });
});

$('#add_user_frm').submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action: "process_add_new_user",
            username : $('form#add_user_frm input[name=user_name]').val(),
            email: $('form#add_user_frm input[name=email]').val(),
            password : $('form#add_user_frm input[name=password]').val(),
            role : $('form#add_user_frm select[name=role]').val(),
            status : $('form#add_user_frm select[name=status]').val()
        },
        dataType: "html",
        beforeSend: function () {
            $('form#add_user_frm button[type=submit]').attr('disabled',true);
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create('Success', parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                setTimeout(function () {
                    window.location.reload(true);
                },1000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {

        }
    });
});
</script>
<!-- //Custom script -->