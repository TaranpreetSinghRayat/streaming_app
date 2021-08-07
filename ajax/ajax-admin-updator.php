<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 20-07-2021
 * Time: 14:40
 */

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'process_check_update':
            $UPD = new \App\Updator();
            echo json_encode(['status' => 1, 'msg' => $UPD->check_latest_ver()]);
            break;
        case 'process_download_update':
            //downloading the updated files.
            $UPD = new \App\Updator();
            $update_files = file_put_contents(APP_ROOT . $UPD->get_latest_ver() . '.zip',file_get_contents(\App\Settings::get_value('updator.mirror') .''.$UPD->get_latest_ver().'.zip'));
            if($update_files){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::UPDATOR['FL_DWN_SCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => 'Something went wrong while downloading update.']);
            }
            break;
        case 'process_install_update':
                $UPD = new \App\Updator();
                $zip = new ZipArchive;
                $res = $zip->open(APP_ROOT .'/'. $UPD->get_latest_ver() . '.zip');
                if ($res === TRUE) {
                    $zip->extractTo(APP_ROOT);
                    $zip->close();
                    \App\Settings::update(\App\Settings::get_id_by_key('app.version'),[
                        'value' => $UPD->get_latest_ver()
                    ]);
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::UPDATOR['INS_SCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::UPDATOR['INS_FAL']]);
                }
            break;
        case 'process_clean_update':
            //remove update files from server.
            $UPD = new \App\Updator();
            if(file_exists(APP_ROOT .'/'. $_POST['ver'] . '.zip')){
                if(unlink(APP_ROOT . '/' . $_POST['ver'] . '.zip')){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::UPDATOR['SCC_CLN']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::UPDATOR['ERR_CLN']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::UPDATOR['ERR_FL']]);
            }
            break;
        default:
            echo json_encode(['status' => 0, 'msg' => 'Invalid action.']);
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => 'Invalid request.']);
}