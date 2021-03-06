<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 03-07-2021
 * Time: 15:15
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
$USERS = new \App\Users();

echo $TPL->render('auth/account',[
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'title' => $USERS->find(\App\Session::get('UID'))['username'] . ' Account',
    'user_data' => $USERS->find(\App\Session::get('UID'))

]);
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
<script>
    $("#update_account").submit((e) => {
        e.preventDefault();

        var data = {
            action: 'update_account',
            email: $("input[name=email]").val(),
            f_name: $("input[name=f_name]").val(),
            l_name: $("input[name=l_name]").val(),
            user: $("input[name=user]").val()
        }

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: data,
            dataType: "html",
            success: function (resp) {
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                }else{
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }
            },
            error: function (err) {
                console.log(err)
            },
        });
    });

    $('#update_password input[name=new_pass]').keyup(function () {
        var password = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action:'check_password_strength', password},
            dataType: "html",
            beforesend: function () {
                $('#update_password input[name=update]').prop('disabled',true);
            },
            success: function (resp) {
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    $('#user_pass_txt').html("<p style='color: green'>"+ parsed_data.msg +"</p>");
                    $('#update_password input[name=update]').prop('disabled',false);
                }else{
                    $('#user_pass_txt').html("<p style='color: red'>"+ parsed_data.msg +"</p>");
                    $('#update_password input[name=update]').prop('disabled',true);
                }
            },
            error: function (err) {
                console.log(err)
            },
        });
    })

    $("#update_password").submit((e) => {
        e.preventDefault();

        var data = {
            action: 'update_password',
            old: $("input[name=old_pass]").val(),
            password: $("input[name=new_pass]").val(),
            confirm_password: $("input[name=confirm_pass]").val(),
            user: $("input[name=user]").val()
        }

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: data,
            dataType: "html",
            success: function (resp) {
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                    document.getElementById("update_password").reset();
                }else{
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }
            },
            error: function (err) {
                console.log(err)
            },
        });
    });

    $("#update_avatar").submit((e) => {
        e.preventDefault();

        var formData = new FormData();
        formData.append('avatar', $('form#update_avatar input[name=avatar]').prop('files')[0]);
        formData.append('id', $("form#update_avatar input[name=userID]").val());
        formData.append('action','update_avatar');

        $.ajax({
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            success: function(resp){
                Toast.create("Success", 'Avatar updated', TOAST_STATUS.SUCCESS, 5000);
            },
            error : function (err) {
                console.log(err);
                alert('Something went wrong.');
            }
        });

    });
</script>
<!-- //Custom Script -->