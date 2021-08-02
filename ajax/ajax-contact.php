<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 05-07-2021
 * Time: 13:38
 */

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_HOST']}");
header("Content-Type: application/json; charset=UTF-8");

include dirname(__DIR__).'/config/config.php';

if(isset($_POST) && isset($_POST['action'])){
    switch ($_POST['action']){

        default:
            $validator = new \App\Validator();
            $valData = $validator->validate($_POST,[
                'name' => [
                    'required' => true,
                    'max' => 35,
                    'min' => 3
                ],
                'email' => [
                    'required' => true,
                    'max' => 50
                ],
                'message' => [
                    'required' => true,
                    'min' => 20,
                    'max' => 1000
                ]
            ]);

            if($valData->passed()){
                //ceate contact query.
                $CONTACT = new \App\Contactus();
                if($CONTACT->add([
                    'name' => \App\Security::clean($_POST['name']),
                    'email' => \App\Security::clean($_POST['email']),
                    'phone' => \App\Security::clean($_POST['phone']),
                    'message' => \App\Security::clean($_POST['message'])
                ])){

                    //Send email to admin.
                        $MAILER = new \App\Mailer();
                        $TPL = new \App\Template();
                        $TPL->set_folder(TEMPLATE.'/'. \App\Settings::get_value('app.theme') . '/emails');
                        $MAILER->sendMail(
                            \App\Settings::get_value('admin.email'),
                            \App\Settings::get_value('app.name') . ' Contact Query',
                            $TPL->render('contactus',[
                                'app_name' => \App\Settings::get_value('app.name'),
                                'name' => \App\Security::clean($_POST['name']),
                                'email' => \App\Security::clean($_POST['email']),
                                'phone' => \App\Security::clean($_POST['phone']),
                                'message' => \App\Security::clean($_POST['message'])
                            ])
                        );
                        echo json_encode(['status' => 1, 'msg' => \App\MSG::CONTACT['QRY_SUCC'], 'mail_status' => $MAILER->getStatus()]);
                }else{
                        echo json_encode(['status' => 0, 'msg' => \App\MSG::CONTACT['ERR_QRY']]);
                }
            }else{

                echo json_encode(['status' => 0, 'msg' => $valData->errors()]);
            }
            break;
    }
}else{
    echo json_encode(['status' => 0, 'msg' => 'Invalid request.']);
}