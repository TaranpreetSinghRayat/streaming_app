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
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            exit();
            break;
        case 'check_username_exists':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'username' => [
                    'min' => 5,
                    'unique' => \App\Config::TBL_NAMES['USERS']
                ]
            ]);
            if($valData->passed()){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['USR_VALID']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            exit();
            break;
        case 'process_registration':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'password' => [
                    'matches' => 'confirm_password'
                ]
            ]);
            if($valData->passed()){
                $user = new \App\Users();
                $acc_key = generate_account_key();
                if($user->add([
                    'username' => \App\Security::clean($_POST['username']),
                    'email' => \App\Security::clean($_POST['email']),
                    'first_name' => \App\Security::clean($_POST['first_name']),
                    'last_name' => \App\Security::clean($_POST['last_name']),
                    'password' => \App\Security::encrypt($_POST['password']),
                    'avatar' => BASE_URL_ASSETS . 'images/avatars/default.png',
                    'last_login' => timestamp(),
                    'account_key' => $acc_key
                ])){
                    $MAILER = new \App\Mailer();
                    $TPL = new \App\Template();
                    $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
                    $MAILER->sendMail(
                        \App\Security::clean($_POST['email']),
                        \App\Settings::get_value('app.name') . 'Account Activation',
                        $TPL->render('account_active',[
                            'app_name' => \App\Settings::get_value('app.name'),
                            'username' => \App\Security::clean($_POST['username']),
                            'user_email' => \App\Security::clean($_POST['email']),
                            'welcome_text' => \App\MSG::MAIL['ACC_ACTIVE_WLC'],
                            'acc_activation_link' => BASE_URL . '/login?p=activate&k='. $acc_key,
                            'btn_text' => 'Activate Account',
                            'emergency_note' => '',
                            'admin_mail' => \App\Settings::get_value('admin.email')
                        ]));
                    if($MAILER->getStatus()){
                        echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['ACC_CRET_CHK_MAIL']]);
                    }else{
                        echo json_encode(['status' => 2, 'msg' => \App\MSG::AUTH['ACC_CRET_ERR_MAIL']]);
                    }
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ERR_REGISTER']]);
                }
            }else{
                echo json_encode(['status' => 0, msg => $valData->errors()]);
            }
            exit();
            break;
        case 'check_password_strength':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'password' => [
                    'min' => 8,
                    'max' => 50
                ]
            ]);
                if($valData->passed()){
                    if(\App\Security::password_strength($_POST['password'])){
                        echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['PASS_VALID']]);
                    }else{
                        echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['PASS_ERR']]);
                    }
                }else{
                    echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
                }
                exit();
            break;
        default:
            echo(json_encode(['status' => 0, 'msg' => 'Invalid parameters supplied.']));
            break;
    }
}else{
    echo(json_encode(['status' => 0, 'msg' => 'Invalid request.']));
    exit();
}