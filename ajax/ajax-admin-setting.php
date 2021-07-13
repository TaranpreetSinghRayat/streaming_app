<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 13-07-2021
 * Time: 16:43
 */
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'process_update':
                if(\App\Settings::update($_POST['id'],[
                    'value' => \App\Security::clean($_POST['val'])
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::SETTINGS['UPDT_SUCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::SETTINGS['ERR_UPDT']]);
                }
            break;
        default:
            echo json_encode(['status' => 0, 'msg' => 'Invalid action.']);
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => 'Invalid request.']);
}