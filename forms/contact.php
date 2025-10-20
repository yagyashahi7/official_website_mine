<?php
// ===============================
// Contact Form - SMTP (Gmail)
// ===============================

// 1. Import PHPMailer (you can get it from https://github.com/PHPMailer/PHPMailer)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/PHPMailer/src/Exception.php';
require '../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/PHPMailer/src/SMTP.php';

// 2. Gmail account you want to receive messages at
$receiving_email_address = 'yagyashahiofficial07@gmail.com';

// 3. Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'yagyashahiofficial07@gmail.com'; // your Gmail address
    $mail->Password   = 'pgkt btin bbnr pykd'; // your Gmail App Password (see note below)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($receiving_email_address, 'Yagya Official');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = nl2br("From: {$_POST['name']} ({$_POST['email']})\n\nMessage:\n{$_POST['message']}");
    $mail->AltBody = "From: {$_POST['name']} ({$_POST['email']})\n\nMessage:\n{$_POST['message']}";

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>
