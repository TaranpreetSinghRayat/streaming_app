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
    ?>
    <!-- //Navigation Section -->
<!-- Body Section -->
<?php

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
$('#add_new_cast').submit((e) => {
    e.preventDefault();

    var formData = new FormData();
    formData.append('c_avatar', $('#c_avatar').prop('files')[0]);
    var avatar_upload = false;

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
            data: {
                action: "process_add_cast",
                name:$("input[name=c_name]").val(),
                c_role:$("select[name=c_role]").val(),
                c_description:$("textarea[name=c_description]").val()
            },
            dataType: "html",
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    var dir_id = parsed_data.data;
                    formData.append('dir', dir_id);
                    $.ajax({
                        url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
                        dataType: 'text',  // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        type: 'post',
                        success: function(php_script_response){
                            console.log(php_script_response);
                            Toast.create("Cast Added", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                            window.location.reload(true);
                        }
                    });
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

$('.delete_cast').click(function (){
    var id = $(this).attr('data-castid');
    var decision = confirm("<?= \App\MSG::CASTS['CNF_DLT'] ?>");
    if(decision == true){
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
            data: {
                action: "process_delete_cast",
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

$('#edit_cast').on('shown.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var castID = button.data('castid');
    var modal = $(this);
    //ajax load single cast data to modal
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
        data: {
            action: "process_get_cast",
            castID : castID
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
                modal.find('input[name=c_name]').val(parsed_data.data.name);
                modal.find('select[name=c_role]').val(parsed_data.data.role);
                modal.find('textarea[name=c_description]').val(parsed_data.data.description);
                modal.find('input[name=castID]').val(parsed_data.data.id);

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

})

$('#edit_cast_frm').submit(function (e) {
       e.preventDefault();

    var formData = new FormData();
    formData.append('c_avatar', $('form#edit_cast_frm #c_avatar').prop('files')[0]);
    formData.append('dir', $("form#edit_cast_frm input[name=castID]").val());

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
        data: {
            action: "process_update_cast",
            c_name:$("form#edit_cast_frm input[name=c_name]").val(),
            c_role:$("form#edit_cast_frm select[name=c_role]").val(),
            c_description:$("form#edit_cast_frm textarea[name=c_description]").val(),
            c_id: $("form#edit_cast_frm input[name=castID]").val()
        },
        dataType: "html",
        beforeSend: function () {

        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                $.ajax({
                    url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    type: 'post',
                    success: function(php_script_response){
                        console.log(php_script_response);
                    }
                });
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
