<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendMail($reciever, $name, $sub , $msg){
    $mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'yasirusulochana19@gmail.com'; 
    $mail->Password = 'jiecxqfrynnwyrfu'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('yasirusulochana19@gmail.com', 'MENTOR');
    $mail->addAddress("$reciever", "$name"); 

    $mail->isHTML(true); 
    $mail->Subject = "$sub";
    $mail->Body = "$msg";
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

?>