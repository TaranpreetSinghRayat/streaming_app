<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 27-07-2021
 * Time: 15:26
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
    'page_title' => 'Genre | '. APP_NAME,
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

echo $TPL->render('genre/view', [
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
    $('#add_new_genre').submit((e) => {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
            data: {
                action: "process_add_genre",
                name:$("input[name=g_name]").val(),
            },
            dataType: "html",
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                    setTimeout(function () {
                        window.location.reload(true);
                    },2000)
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
    
    $('.delete_genre').click(function () {
        var id = $(this).attr('data-genreid');
        var decision = confirm("<?= \App\MSG::GENRE['CNF_DLT'] ?>");
        if(decision == true){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
                data: {
                    action: "process_delete_genre",
                    id : id
                },
                dataType: "html",
                beforeSend: function () {

                },
                success: function (resp) {
                    console.log(resp);
                    var parsed_data = JSON.parse(resp);
                    if(parsed_data.status == 1){

                        Toast.create("Cast Removed", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                        setTimeout(function () {
                            window.location.reload(true);
                        },2000);
                    }else{
                        Toast.create("Attention!", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                    }
                },
                error: function (err) {
                    alert("Critical Error Contact Developer");
                },
                complete: function () {

                }
            });
        }else{
            //Process the cancel decision.
        }
    });

    $('#edit_genre').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var genreID = button.data('genreid');
        var modal = $(this);
        //ajax load single cast data to modal
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
            data: {
                action: "process_get_genre",
                genreID
            },
            dataType: "html",
            beforeSend: function () {
                $('div.spinner-border').css('display','block');
                $('div.form-data').css('display','none');
            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    modal.find('.modal-title').text('Edit '+ parsed_data.data.name);
                    modal.find('input[name=g_name]').val(parsed_data.data.name);
                    modal.find('input[name=genreID]').val(parsed_data.data.id);

                }else{
                    Toast.create("Attention!", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }
            },
            error: function (err) {
                alert("Critical Error Contact Developer");
            },
            complete: function () {
                $('div.spinner-border').css('display','none');
                $('div.form-data').css('display','block');
            }
        });

    });

    $('#edit_genre_frm').submit(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
            data: {
                action: "process_update_genre",
                name:$("form#edit_genre_frm input[name=g_name]").val(),
                id:$("form#edit_genre_frm input[name=genreID]").val()
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

            }
        });
    });
</script>
<!-- //Custom Script -->