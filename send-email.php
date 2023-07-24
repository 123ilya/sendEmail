<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php'; //Добавляем автозагрузчик композера

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$messege = $_POST["message"];

$mail = new PHPMailer(true); //Создаём экземпляр класса PHPMailer, для последующей работы с ним.

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smpt.gmail.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = '123ilyaexample@gmail.com';
    $mail->Password = ''; //Пароль!!!!!!!!!!!!!!!!!!!!!!!

    $mail->setFrom($email, $name);
    $mail->addAddress('123ilya@gmail.com');
    $mail->Subject = $subject;
    $mail->Body = $messege;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
