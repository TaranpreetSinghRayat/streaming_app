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
    $usrData = null;
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
                    'ip' => get_ip(),
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
                            'acc_activation_link' => BASE_URL . '/login.php?p=activate&k='. $acc_key,
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
            break;
        case 'check_username_email_exists':
            $user = new \App\Users();
            if($usrData = $user->find($_POST['user'])){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['USR_FND'], 'data' =>  $usrData]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['USR_NT_FND']]);
            }
            break;
        case 'process_password_recovery':
            $user = new \App\Users();
            $usr_data = $usr_data ?? $user->find($_POST['user']);
            $MAILER = new \App\Mailer();
            $TPL = new \App\Template();
            $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
            $MAILER->sendMail(
                $usr_data['email'],
                \App\Settings::get_value('app.name') . ' Password Recovery',
                $TPL->render('recover_password',[
                    'app_name' => \App\Settings::get_value('app.name'),
                    'username' => \App\Security::clean($usr_data['username']),
                    'user_email' => \App\Security::clean($usr_data['email']),
                    'welcome_text' => \App\MSG::AUTH['ACC_PSS_RCV'],
                    'acc_activation_link' => BASE_URL . '/login.php?p=recover&k='. $usr_data['account_key'],
                    'btn_text' => 'Reset Password',
                    'emergency_note' => 'link is valid upto 5 min. only.',
                    'admin_mail' => \App\Settings::get_value('admin.email')
                ])
            );
            if($MAILER->getStatus()){
                $user->change_token_event($usr_data['id'], 5);
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['ACC_RCV']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ERR_ACC_RCV']]);
            }
            break;
        case 'process_login':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'username' => [
                    'required' => true
                ],
                'password' => [
                    'required' => true
                ]
            ]);
            if($valData->passed()){
                $user = new \App\Users();
                if($user->login($_POST['username'],$_POST['password'])){
                    \App\Session::del('USR_ERR');
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['SUCC_LOG']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\Session::get('USR_ERR')]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            break;
        case 'process_resetPassword':
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'password' => [
                    'matches' => 'confirm_password'
                ]
            ]);

            if($valData->passed()){
                $user = new \App\Users();
                $acc_key = generate_account_key();
                if($user->update($_POST['user'],[
                    'password' => \App\Security::encrypt($_POST['password']),
                    'last_login' => timestamp(),
                    'account_key' => $acc_key
                ])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['PASS_RST_SUCC']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ERR_PASS_RST']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            break;
        case 'update_account':
                $validator = new \App\Validator();
                $valData = $validator->validate($_POST,[
                    'email' => [
                        'required' => true
                    ],
                    'f_name' => [
                        'required' => true
                    ],
                    'l_name' => [
                        'required' => true
                    ]
                ]);
                if($valData->passed()){
                    $user = new \App\Users();
                    if($user->update($_POST['user'],[
                        'email' => \App\Security::clean($_POST['email']),
                        'first_name' => \App\Security::clean($_POST['f_name']),
                        'last_name' => \App\Security::clean($_POST['l_name'])
                    ])){
                        echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['PRF_UPDT_SUCC']]);
                    }else{
                        echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['PRF_UPDT_FAIL']]);
                    }
                }else{
                    echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
                }
            break;
        case 'update_password':
                $validator = new \App\Validator();
                $valData = $validator->validate($_POST,[
                    'old' => [
                        'required' => true
                    ],
                    'password' => [
                        'matches' => 'confirm_password'
                    ]
                ]);
                if($valData->passed()){
                    //check if old password is valid or not.
                    $user = new \App\Users();
                    if($user->find($_POST['user'])['password'] == \App\Security::encrypt($_POST['old'])){
                        if($user->update($_POST['user'],[
                                'password' => \App\Security::encrypt($_POST['password'])
                        ])){
                            echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['PASS_RST_SUCC']]);
                        }else{
                            echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ERR_PASS_RST']]);
                        }
                    }else{
                        echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['INV_PASS']]);
                    }
                }else{
                    echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
                }
            break;
        case 'update_avatar':
            $upload_dir = mkdir(AVATAR_ASSETS . $_POST['id'] .'/');
            $upload_dir = AVATAR_ASSETS . $_POST['id'] . '/';
            $UPLOAD = new \App\Uploader($_FILES['avatar'], $upload_dir, \App\Settings::get_value('uploader.max_size') * 1024, explode(',', \App\Settings::get_value('uploader.allowed_mime')));
            $imgResult = $UPLOAD->getResult();
            if ($imgResult['type'] == 'success') {
                $USER = new \App\Users();
                if($USER->update($_POST['id'],['avatar' => substr($imgResult['path'], 3)])){
                    echo json_encode(['status' => 1, 'msg' => \App\MSG::CASTS['AVT_UPL']]);
                }else{
                    echo json_encode(['status' => 0, 'msg' => \App\MSG::CASTS['AVT_ERR']]);
                }
            }else{
                echo json_encode(['status' => 0, 'msg' => $imgResult['message']]);
            }
            break;
        default:
            echo(json_encode(['status' => 0, 'msg' => 'Invalid parameters supplied.']));
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => 'Invalid request.']);
}