<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function base_url($slug = '') {
    return sprintf(
            "%s://%s/%s",
            (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ? 'https' : 'http',
            $_SERVER['HTTP_HOST'],
            $slug
    );
}

function redirect($url) {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location=\'' . $url . '\';</script‌​>');
    } else {
        header('Location: ' . $url);
        die();
    }
}

function get_mail_smtp() {
    $mail                   =   new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug        =   SMTP::DEBUG_OFF;                        //Enable verbose debug output
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host             =   CONST_MAIL_SERVER;                      //Set the SMTP server to send through
    $mail->SMTPAuth         =   true;                                   //Enable SMTP authentication
    $mail->Username         =   CONST_MAIL_USERNAME;                    //SMTP username
    $mail->Password         =   CONST_MAIL_PASSWORD;                    //SMTP password
    $mail->SMTPSecure       =   PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port             =   CONST_MAIL_PORT;
    
    //Recipients
    $mail->setFrom(CONST_MAIL_FROM, CONST_MAIL_FROM_NAME);
    
    $mail->addAddress(CONST_RECEIVE_EMAIL);

    return $mail;
}

?>