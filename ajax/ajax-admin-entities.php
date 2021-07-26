<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 16-07-2021
 * Time: 12:50
 */

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'process_add_cast':
            $CAST = new \App\Casts;
                if($id = $CAST->add([
                    'name' => \App\Security::clean($_POST['c_name']),
                    'avatar' => '',
                    'role' => \App\Security::clean($_POST['c_role']),
                    'description' => \App\Security::clean($_POST['c_description']),
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['ADD_SUCC'], 'data' => $id]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::CASTS['ADD_ERR']]);
                }
            break;
        case 'process_delete_cast':
            //perform check is cast id is under use or not.
            $ENTITIES = new \App\Entities;
            if(!$ENTITIES->check_cast_in_use($_POST['id'])){
                $CAST = new \App\Casts;
                $cast_data = $CAST->get_by_id($_POST['id']);
                $CAST->delete($_POST['id']);
                //delete the avatar folder and file from server.
                unlink('../' . $cast_data['avatar']);
                rmdir(CAST_ASSETS . '' . $_POST['id']);
                echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['RMV_SUCC']]);
            }
            echo json_encode(['status' => 0, 'msg' => App\MSG::CASTS['IN_USE']]);
            break;
        default:
            echo json_encode(['status' => 0, 'msg' => \App\MSG::ACTION['INV_RQT']]);
            break;
    }
}else{
    $upload_dir = mkdir(CAST_ASSETS . $_POST['dir'] .'/');
    $upload_dir = CAST_ASSETS . $_POST['dir'] . '/';
    $UPLOAD = new \App\Uploader($_FILES['c_avatar'], $upload_dir, \App\Settings::get_value('uploader.max_size') * 1024, explode(',', \App\Settings::get_value('uploader.allowed_mime')));
    $imgResult = $UPLOAD->getResult();
    if ($imgResult['type'] == 'success') {
        $CAST = new \App\Casts;
        if($CAST->update($_POST['dir'],['avatar' => substr($imgResult['path'], 3)])){
            echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['AVT_UPL']]);
        }else{
            echo json_encode(['status' => 0, 'msg' => \App\MSG::CASTS['AVT_ERR']]);
        }
    }else{
        echo json_encode(['status' => 0, 'msg' => $imgResult['message']]);
    }
}