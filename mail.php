<?php 

// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->CharSet = 'utf-8';

// Передача переменных

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$message = $_POST['message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'danil.nizamutdinov7@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'ddYazD3gd29D0385vdHg'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('danil.nizamutdinov7@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('danil.nizamutdinov7@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = ' Заявка на убору ';
$mail->Body    = '' .$name. ' оставил заявку,<br/> его телефон ' .$phone. '</br> сообщение: ' .$message;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}

?>