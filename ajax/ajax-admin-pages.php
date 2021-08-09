<?php
/**
 * User: TweekersNut Network
 * Date: 08-08-2021
 * Time: 00:41
 */
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'process_draft_page':
            $PAGES = new \App\Pages();
            if($PAGES->update($_POST['pageID'],[
                'status' => 0
            ])){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::PAGES['DRF_SUCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::PAGES['DRF_FAL']]);
            }
            break;
        case 'process_publish_page':
            $PAGES = new \App\Pages();
            if($PAGES->update($_POST['pageID'],[
                'status' => 1
            ])){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::PAGES['PUB_SUCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::PAGES['PUB_FAL']]);
            }
            break;
        case 'process_delete_page':
            $PAGES = new \App\Pages();
            $PAGES->delete($_POST['pageID']);
            echo json_encode(['status' => 1, 'msg' => \App\MSG::PAGES['DEL_SCC']]);
            break;
        case 'process_create_page':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'title' => [
                    'required' => true,
                    'min' => 3,
                    'max' => 50
                ],
                'slug' => [
                    'unique' => \App\Config::TBL_NAMES['PAGES']
                ]
            ]);

            if($valData->passed()){
                $PAGES = new \App\Pages();
                if($PAGES->add([
                    'slug' => $_POST['slug'],
                    'title' => \App\Security::clean($_POST['title']),
                    'content' => $_POST['content'],
                    'headerID' => $_POST['header'],
                    'isLoggedIn' => $_POST['permission'],
                    'status' => 1
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::PAGES['CRT_SUCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::PAGES['CRT_FAL']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            break;
        case 'process_get_page':
            $PAGES = new \App\Pages();
            $PAGE = $PAGES->get_page((int)$_POST['pageID']);
            if(!empty($PAGE)){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::PAGES['FTC_SCC'], 'data' => $PAGE]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::PAGES['FTC_FAL']]);
            }
            break;
        case 'process_update_page':
            $PAGES = new \App\Pages();
            if($PAGES->update($_POST['pageID'],[
                'slug' => $_POST['slug'],
                'title' => \App\Security::clean($_POST['title']),
                'content' => $_POST['content'],
                'headerID' => $_POST['header'],
                'isLoggedIn' => $_POST['permission'],
                'status' => 1
            ])){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::PAGES['UPD_SUCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::PAGES['UPD_FAIL']]);
            }
            break;
        default:
            echo json_encode(['status' => 0, 'msg' => \App\MSG::ACTION['INV_RQT']]);
            break;
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => \App\MSG::ACTION['INV_RQT']]);
}