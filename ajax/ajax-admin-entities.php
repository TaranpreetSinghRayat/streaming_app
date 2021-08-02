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
            $validation = new \App\Validator();
            $valData = $validation->validate($_POST,[
                'name' => [
                    'max' => 45,
                    'unique' => \App\Config::TBL_NAMES['CASTS']
                ]
            ]);
            if($valData->passed()){
                $CAST = new \App\Casts;
                if($id = $CAST->add([
                    'name' => \App\Security::clean($_POST['name']),
                    'avatar' => '',
                    'role' => \App\Security::clean($_POST['c_role']),
                    'description' => \App\Security::clean($_POST['c_description']),
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['ADD_SUCC'], 'data' => $id]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::CASTS['ADD_ERR']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
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
            }else{
                echo json_encode(['status' => 0, 'msg' => App\MSG::CASTS['IN_USE']]);
            }
            break;
        case 'process_update_cast':
                $CAST = new \App\Casts();
                if($CAST->update($_POST['c_id'],[
                    'name' => \App\Security::clean($_POST['c_name']),
                    'role' => \App\Security::clean($_POST['c_role']),
                    'description' => \App\Security::clean($_POST['c_description']),
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['UPT_SUCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::CASTS['UPT_ERR']]);
                }
            break;
        case 'process_get_cast':
            $CAST = new \App\Casts();
            echo json_encode(['status' => 1, 'msg' => 'cast data', 'data' => $CAST->get_by_id($_POST['castID'])]);
            break;
        case 'process_add_genre':
            $validation = new \App\Validator();
            $valData = $validation->validate($_POST,[
                'name' => [
                    'unique' => \App\Config::TBL_NAMES['GENRE']
                ]
            ]);
            if($valData->passed()){
                $GENRE = new \App\Genre();
                if($GENRE->add([
                    'name' => \App\Security::clean($_POST['name'])
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::GENRE['ADD_SUCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::GENRE['ADD_ERR']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            break;
        case 'process_delete_genre':
            $GENRE = new \App\Genre();
            $GENRE->delete($_POST['id']);
            echo json_encode(['status' => 1, 'msg' => \App\MSG::GENRE['DLT_SCC']]);
            break;
        case 'process_get_genre':
                $GENRE = new \App\Genre();
                echo json_encode(['status' => 1, 'msg' => 'genre data', 'data' => $GENRE->get_by_id($_POST['genreID'])]);
            break;
        case 'process_update_genre':
            $validation = new \App\Validator();
            $valData = $validation->validate($_POST,[
                'name' => [
                    'min' => 1,
                    'max' => 45,
                    'unique' => \App\Config::TBL_NAMES['GENRE']
                ]
            ]);

            if($valData->passed()){
                $GENRE = new \App\Genre();
                if($GENRE->update($_POST['id'],[
                    'name' => \App\Security::clean($_POST['name'])
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::GENRE['UDT_SCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::GENRE['UDT_ERR']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }

            break;
        case 'process_add_tag':
                $validator = new \App\Validator();
                $valData = $validator->validate($_POST,[
                    'name' => [
                        'max' => 30,
                        'min' => 1,
                        'required' => true,
                        'unique' => \App\Config::TBL_NAMES['TAGS']
                    ]
                ]);
                if($valData->passed()){
                    $TAGS = new \App\Tags();
                    if($TAGS->add([
                        'name' => \App\Security::clean($_POST['name'])
                    ])){
                        echo json_encode(['status' => 1, 'msg' => \App\MSG::TAGS['ADD_SUCC']]);
                    }else{
                        echo json_encode(['status' => 0, 'msg' => \App\MSG::TAGS['ERR_ADD']]);
                    }
                }else{
                    echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
                }
            break;
        case 'process_delete_tag':
            $TAGS = new \App\Tags();
            $TAGS->delete($_POST['id']);
            echo json_encode(['status' => 1, 'msg' => \App\MSG::TAGS['DLT_SCC']]);
            break;
        case 'process_get_tag':
            $TAGS = new \App\Tags();
            echo json_encode(['status' => 1, 'msg' => 'tag data', 'data' => $TAGS->get_by_id($_POST['tagID'])]);
            break;
        case 'process_update_tag':
            $validation = new \App\Validator();
            $valData = $validation->validate($_POST,[
                'name' => [
                    'min' => 1,
                    'max' => 45,
                    'unique' => \App\Config::TBL_NAMES['TAGS']
                ]
            ]);

            if($valData->passed()){
                $TAGS = new \App\Tags();
                if($TAGS->update($_POST['id'],[
                    'name' => \App\Security::clean($_POST['name'])
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::TAGS['UDT_SCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::TAGS['UDT_ERR']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
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
            if($remove_old_avatar){
                $cast_data = $CAST->get_by_id($_POST['dir']);
                unlink('../' . $cast_data['avatar']);
            }
            echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['AVT_UPL']]);
        }else{
            echo json_encode(['status' => 0, 'msg' => \App\MSG::CASTS['AVT_ERR']]);
        }
    }else{
        echo json_encode(['status' => 0, 'msg' => $imgResult['message']]);
    }
}