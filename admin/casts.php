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

    var formData = new FormData();
    formData.append('c_avatar', $('#c_avatar').prop('files')[0]);
    var avatar_upload = false;

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-admin-entities.php",
            data: {
                action: "process_add_cast",
                c_name:$("input[name=c_name]").val(),
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
</script>
<!-- //Custom Script -->
