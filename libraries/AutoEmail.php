<?php
/*
 * *************************** Creation Log *********************************
* File Name - AutoEmail.php
* Description - Script to send error log, should be used with a cron job* 
* Version - 1.0
* Created by - Anirudh Pandita
* Created on - April 07, 2013
* ***************************************************************************
*/
require "/var/www/ulearn/branches/development/libraries/PHPMailer/class.phpmailer.php";

$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug = 0; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; 
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = "ulearnoss@gmail.com";
$mail->Password = "root@osscube.com";
$mail->SetFrom("ulearnoss@gmail.com", "ulearn errors");
$mail->Subject = "ulearn error log ";

$mail->AddAddress("anirudh.pandita@osscube.com");
$mail->MsgHTML("Error log attached");
$mail->AddAttachment("/var/www/ulearn/branches/development/errors.log");
if (! $mail->Send()) {
    echo "There was an error sending the message";
    echo $mail->ErrorInfo;
    exit();
}
echo "Message was sent successfully";

?>
