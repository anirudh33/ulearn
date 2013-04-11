<?php
require "/var/www/ulearn/branches/development/libraries/PHPMailer/class.phpmailer.php";

$mail = new PHPMailer ();
	$mail->IsSMTP (); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = "anirudh.pandita@osscube.com";
	$mail->Password = "Apple321";
	$mail->SetFrom ( "anirudh.pandita@osscube.com", "ulearn errors" );
	$mail->Subject = "ulearn error log";
	
	$mail->AddAddress ( "anirudh.pandita@osscube.com");
	$mail->MsgHTML ( "Error log attached");
	$mail->AddAttachment ( "/var/www/ulearn/branches/development/errors.log" );
	if (! $mail->Send ()) {
		echo "There was an error sending the message";
		echo $mail->ErrorInfo;
		exit ();
	}
	echo "Message was sent successfully";

?>
