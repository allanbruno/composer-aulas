<?php

require "../vendor/autoload.php";

use app\src\Mail;

$email = new Mail;
$email->send();