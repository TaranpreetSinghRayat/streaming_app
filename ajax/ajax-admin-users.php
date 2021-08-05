<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 31-07-2021
 * Time: 12:22
 */

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'process_add_new_user':
                $validator = new \App\Validator();
                $valData = $validator->validate($_POST,[
                   'username' => [
                       'required' => true,
                       'min' => 5,
                       'max' => 35,
                       'unique' => \App\Config::TBL_NAMES['USERS']
                   ],
                    'email' => [
                        'required' => true,
                        'min' => 5,
                        'max' => 45,
                        'unique' => \App\Config::TBL_NAMES['USERS']
                    ],
                    'password' => [
                        'required' => true,
                        'min' => 8,
                        'max' => 35
                    ]
                ]);
                if($valData->passed()){
                    if(\App\Security::password_strength($_POST['password'])){
                        $USER = new \App\Users();
                        $acc_key = generate_account_key();
                        if($USER->add([
                            'username' => \App\Security::clean($_POST['username']),
                            'email' => \App\Security::clean($_POST['email']),
                            'first_name' => 'John',
                            'last_name' => 'Doe',
                            'password' => \App\Security::encrypt($_POST['password']),
                            'avatar' => BASE_ASSETS . 'images/avatars/default.png',
                            'last_login' => timestamp(),
                            'ip' => get_ip(),
                            'account_key' => $acc_key,
                            'role' => $_POST['role'],
                            'status' => $_POST['status']
                        ])){
                            $MAILER = new \App\Mailer();
                            $TPL = new \App\Template();
                            $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
                            if($_POST['status'] == 0){
                                //send account details with account activation link.
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
                                        'emergency_note' => 'Account password: '. $_POST['password'],
                                        'admin_mail' => \App\Settings::get_value('admin.email')
                                    ]));
                            }else{
                                //send username and password email.
                                $MAILER->sendMail(
                                    \App\Security::clean($_POST['email']),
                                    \App\Settings::get_value('app.name') . 'Account Details',
                                    $TPL->render('account_active',[
                                        'app_name' => \App\Settings::get_value('app.name'),
                                        'username' => \App\Security::clean($_POST['username']),
                                        'user_email' => \App\Security::clean($_POST['email']),
                                        'welcome_text' => \App\MSG::MAIL['ACC_ACTIVE_WLC'],
                                        'acc_activation_link' => '#',
                                        'btn_text' => 'Password : '. $_POST['password'],
                                        'emergency_note' => 'Account Password : '. $_POST['password'],
                                        'admin_mail' => \App\Settings::get_value('admin.email')
                                    ]));
                            }
                            echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['USR_CRET']]);
                        }else{
                            echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ERR_REGISTER']]);
                        }
                    }else{
                        echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['PASS_ERR']]);
                    }
                }else{
                    echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
                }
            break;
        case 'process_generate_password':
            echo json_encode(['status' => 1, 'msg' => \App\Security::random_password(8)]);
            break;
        case 'process_resend_acc_act_mail':
            $USER = new \App\Users();
            $userData = $USER->find($_POST['userID']);
            $MAILER = new \App\Mailer();
            $TPL = new \App\Template();
            $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
            $MAILER->sendMail(
                \App\Security::clean($userData['email']),
                \App\Settings::get_value('app.name') . 'Account Activation',
                $TPL->render('account_active',[
                    'app_name' => \App\Settings::get_value('app.name'),
                    'username' => \App\Security::clean($userData['username']),
                    'user_email' => \App\Security::clean($userData['email']),
                    'welcome_text' => \App\MSG::MAIL['ACC_ACTIVE_WLC'],
                    'acc_activation_link' => BASE_URL . '/login.php?p=activate&k='. $userData['account_key'],
                    'btn_text' => 'Activate Account',
                    'emergency_note' => '',
                    'admin_mail' => \App\Settings::get_value('admin.email')
                ]));
            if($MAILER->getStatus()){
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['CHK_MAIL']]);
            }else{
                echo json_encode(['status' => 2, 'msg' => \App\MSG::AUTH['ERR_MAIL']]);
            }
            break;
        case 'process_send_reset_pass_mail':
            $user = new \App\Users();
            $usr_data = $user->find($_POST['userID']);
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
                    'emergency_note' => 'link is valid upto 24 hours only.',
                    'admin_mail' => \App\Settings::get_value('admin.email')
                ])
            );
            if($MAILER->getStatus()){
                $user->change_token_event($usr_data['id'], 1440);
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['ACC_PSS_RST_SUCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ACC_PSS_RST_ERR']]);
            }
            break;
        case 'process_activate_acc':
            $user = new \App\Users();
            $userData = $user->find((int)$_POST['userID']);

            if($user->update($_POST['userID'],[
                'status' => 1
            ])){
                $MAILER = new \App\Mailer();
                $TPL = new \App\Template();
                $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
                $MAILER->sendMail(
                    $userData['email'],
                    \App\Settings::get_value('app.name') . ' Notification',
                    $TPL->render('notification',[
                        'app_name' => \App\Settings::get_value('app.name'),
                        'call_btn' => false,
                        'user' => $userData['username'] . "(".$userData['email'].")",
                        'notification_msg' => \App\MSG::NOTIFICATION['ACC_ACT_AD']
                    ])
                );
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['ACC_ACT_SCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ACC_ACT_FAIL']]);
            }
            break;
        case 'process_activate_deacc':
            $user = new \App\Users();
            $userData = $user->find((int)$_POST['userID']);
            if($user->update($_POST['userID'],[
                'status' => 0
            ])){
                $MAILER = new \App\Mailer();
                $TPL = new \App\Template();
                $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
                $MAILER->sendMail(
                    $userData['email'],
                    \App\Settings::get_value('app.name') . ' Notification',
                    $TPL->render('notification',[
                        'app_name' => \App\Settings::get_value('app.name'),
                        'call_btn' => false,
                        'user' => $userData['username'] . "(".$userData['email'].")",
                        'notification_msg' => \App\MSG::NOTIFICATION['ACC_DEACT_AD']
                    ])
                );
                echo json_encode(['status' => 1, 'msg' => \App\MSG::AUTH['ACC_DEACT_SCC']]);
            }else{
                echo json_encode(['status' => 0, 'msg' => \App\MSG::AUTH['ACC_DEACT_FAIL']]);
            }
            break;
        default:
            echo json_encode(['status' =>1 , 'msg' => 'Invalid Request.']);
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => 'Invalid request.']);
}