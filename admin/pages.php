<?php
/**
 * User: TweekersNut Network
 * Date: 08-08-2021
 * Time: 00:17
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
$PAGES = new \App\Pages();


echo $TPL->render('include/header',[
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Pages | '. APP_NAME,
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

echo $TPL->render('pages/view', [
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'USER' => $USER,
    'USR' => $USR_DATA,
    'PAGES' => $PAGES
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
$('.draft_page').click(function () {
    var btn = $(this);
    var pageID = btn.attr('data-pageID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-pages.php",
        data: {
            action: "process_draft_page",
            pageID
        },
        dataType: "html",
        beforeSend: function () {

        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {
            setTimeout(function(){
                window.location.reload();
            },2000);
        }
    });
});

$('.publish_page').click(function () {
    var btn = $(this);
    var pageID = btn.attr('data-pageID');

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-pages.php",
        data: {
            action: "process_publish_page",
            pageID
        },
        dataType: "html",
        beforeSend: function () {

        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {
            setTimeout(function(){
                window.location.reload();
            },2000);
        }
    });
});

$('.delete_page').click(function () {
    var btn = $(this);
    var pageID = btn.attr('data-pageID');

    var delete_page = confirm("Are you sure ? You won't be able to revert this action.");

    if(delete_page == true){
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-pages.php",
            data: {
                action: "process_delete_page",
                pageID
            },
            dataType: "html",
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                }else{
                    Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }
            },
            error: function (err) {
                alert("Critical Error Contact Developer");
            },
            complete: function () {
                setTimeout(function(){
                    window.location.reload();
                },2000);
            }
        });
    }else{
        //handle cancel request.
    }
});

//dynamically_creating page slug
    $('form#create_new_page input[name=page_title]').keyup(function (e) {
        var page_slug = ($(this).val()).replace(/\s/g, '-');
        $('form#create_new_page input[name=page_slug]').val(page_slug)
    })

    $('#create_new_page').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-pages.php",
            data: {
                action: "process_create_page",
                title : $('input[name=page_title]').val(),
                content : $('#summernote').summernote('code'),
                header: $('select[name=page_header]').val(),
                permission: $('select[name=page_permissions]').val(),
                slug: $('input[name=page_slug]').val()
            },
            dataType: "html",
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                }else{
                    Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }
            },
            error: function (err) {
                alert("Critical Error Contact Developer");
            },
            complete: function () {
                setTimeout(function(){
                    window.location.reload();
                },2000);
            }
        });

    });
</script>
<!-- //Custon Script -->
