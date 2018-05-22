<?php

namespace app\src;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail {

	public function send() {
		$mail = new PHPMailer(true); // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug = 2;      // Enable verbose debug output
		    $mail->isSMTP();           // Set mailer to use SMTP
		    $mail->Host = 'smtp.mailtrap.io'; // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;    // Enable SMTP authentication
		    $mail->Username = 'a3d995bbe79e33';      // SMTP username
		    $mail->Password = '087b271d963b7a';      // SMTP password
		    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;         // TCP port to connect to

		    //Recipients
		    $mail->setFrom('from@example.com', 'Mailer');
		    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Here is the subject';
		    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}

}