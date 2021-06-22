<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 17:53
 */

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    private $mail;
    private $mailSent = false;
    private $settings;

    function __construct(){
        $this->mail = new PHPMailer(true);
        $this->settings = new Settings;
    }

    public function sendMail(string $to,string $subject = '',string $body = '',string $altBody = ''){
        try {
            //Server settings
            //$this->mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $this->mail->isSMTP();                                            // Set mailer to use SMTP
            $this->mail->Host       = Settings::get_value('mail.host');
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = Settings::get_value('mail.username');
            $this->mail->Password   = Settings::get_value('mail.password');
            $this->mail->SMTPSecure = Settings::get_value('mail.enc'); //'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port       = Settings::get_value('mail.port');

            //Recipients
            $this->mail->setFrom(Settings::get_value('admin.email'), Settings::get_value('app.name'));
            $this->mail->addAddress($to);     // Add a recipient
            $this->mail->addReplyTo(Settings::get_value('admin.email'), Settings::get_value('app.name'));

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altBody;

            $this->mail->send();
            $this->mailSent = true;
        } catch (Exception $e) {
            $this->mailSent = false;
            $e->getMessage();
        }
    }

    public function getStatus(){
        return $this->mailSent ? true : false;
    }

}