<?php

use PHPMailer\PHPMailer\PHPMailer;
// namespace app\classes;

class Email extends PHPMailer {

	public function send() {
		return 'Enviar email';
	}

}