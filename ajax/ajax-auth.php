<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 18:35
 */

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])){
    switch ($_POST['action'])
    {
        case 'check_email_exists':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'email' => [
                    'max' => 50,
                    'unique' => \App\Config::TBL_NAMES['USERS']
                ]
            ]);
            if ($valData->passed()) {
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['EMAIL_VALID']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['EMAIL_IN_USE']]);
            }
            break;
        default:
            echo(json_encode(['status' => 0, 'msg' => 'Invalid parameters supplied.']));
            break;
    }
}else{
    echo(json_encode(['status' => 0, 'msg' => 'Invalid request.']));
}