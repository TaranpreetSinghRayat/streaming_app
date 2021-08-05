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

$('.send_acc_act_mail').click(function(){
    var userID = $(this).attr('data-userID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action: "process_resend_acc_act_mail",
            userID
        },
        dataType: "html",
        beforeSend: function () {
            $('.send_acc_act_mail').html('Loading...');
            $('.send_acc_act_mail').css('pointer-events','none');
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create('Success', parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            console.log(err);
            alert("Critical Error Contact Developer");
        },
        complete: function () {
            $('.send_acc_act_mail').html('Resent Acc. Activation Mail');
            $('.send_acc_act_mail').css('pointer-events','all');
        }
    });
});

$('.ip-lookup').click(function(){
    var ip = $(this).attr('data-ip');

    if(ip == '127.0.0.1' || ip == 'localhost'){
        alert('You can not lookup localhost.');
    }else{
        console.log(<?php  ?>)
        $('#ip-lookup').modal('show');
        $('#ip-lookup-title').html('Lookup : '+ ip);
        //ajax request and fetch ip data.
        var lookup_provider = "<?= \App\Settings::get_value('iplookup.service_provider') ?>"
        var lookup_key = "<?= \App\Settings::get_value('iplookup.auth_key') ?>"
        $.ajax({
            type: "GET",
            url: lookup_provider + ip + "?access_key=" + lookup_key,
            data: {
                ip
            },
            dataType: "json",
            success: function (resp) {
                console.log(resp)
                $('div#ip-lookup-data span.type').html(resp.type)
                $('div#ip-lookup-data span.cc').html(resp.continent_code)
                $('div#ip-lookup-data span.cn').html(resp.continent_name)
                $('div#ip-lookup-data span.ccode').html(resp.country_code)
                $('div#ip-lookup-data span.cname').html(resp.country_name)
                $('div#ip-lookup-data span.rc').html(resp.region_code)
                $('div#ip-lookup-data span.rn').html(resp.region_name)
                $('div#ip-lookup-data span.city').html(resp.city)
                $('div#ip-lookup-data span.zip').html(resp.zip)

                $('div#ip-lookup-data span.ltll').html(resp.latitude + ', '+ resp.longitude)
            }
        });

    }
});

$('.pass_rst_mail').click(function () {
    var userID = $(this).attr('data-userID')
    var btn = $(this);
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action:'process_send_reset_pass_mail',
            userID
        },
        dataType: "html",
        beforeSend: function () {
            btn.html('Processing...');
            btn.attr('disabled', true);
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create('Success', parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            console.log(err);
            alert('Soemthing went wrong');
        },
        complete: function () {
            btn.html('Send Password Reset Mail');
            btn.attr('disabled', false);
        }
    });

});

$('.activate_acc').click(function () {
    var btn = $(this);
    var userID = btn.attr('data-userID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action:'process_activate_acc',
            userID
        },
        dataType: "html",
        beforeSend: function () {
            btn.html('Processing...');
            btn.attr('disabled', true);
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
            console.log(err);
            alert('Soemthing went wrong');
        },
        complete: function () {

        }
    });
});

$('.deactive_acc').click(function () {
    var btn = $(this);
    var userID = btn.attr('data-userID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action:'process_activate_deacc',
            userID
        },
        dataType: "html",
        beforeSend: function () {
            btn.html('Processing...');
            btn.attr('disabled', true);
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create('Success', parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);

            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            console.log(err);
            alert('Soemthing went wrong');
        },
        complete: function () {
            setTimeout(function () {
                window.location.reload(true);
            },1000);
        }
    });
});

$('.login_as_user').click(function () {
    var btn = $(this);
    var userID =  btn.attr('data-userID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action:'process_login_user',
            userID
        },
        dataType: "html",
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create('Success', parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                setTimeout(function(){
                    window.open(parsed_data.redir, '_blank');
                },2000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            console.log(err);
            alert('Soemthing went wrong');
        }
    });
});

$('.delete_usr').click(function () {
    var btn = $(this);
    var userID = btn.attr('data-userID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-users.php",
        data: {
            action:'process_login_user',
            userID
        },
        dataType: "html",
        success: function(resp){
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){

            }else{

            }
        },
        error: function (err) {
            console.log(err)
        },
        complete: function () {
            setTimeout(function () {
                window.location.reload(true);
            },2000)
        }
    });
});
</script>
<!-- //Custom script -->