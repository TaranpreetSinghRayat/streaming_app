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

            break;
        default:
            echo json_encode(['status' => 0, 'msg' => 'Invalid action.']);
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => 'Invalid request.']);
}