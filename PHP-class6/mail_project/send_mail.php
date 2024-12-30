<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Include config file
$config = include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP server configuration
    $mail->isSMTP();
    $mail->Host = $config['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['username'];
    $mail->Password = $config['password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
    $mail->Port = $config['port'];

    // Email sender and recipient
    $mail->setFrom($config['from_email'], $config['from_name']);
    $mail->addAddress('paracetamol053@gmail.com', 'Mushfiq'); // Recipient email

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Hacking Alert';
    $mail->Body = '<h1>Hello Mushfiq, Your account is hacked.</h1>';
    $mail->AltBody = 'Hello. This is a alert for hacking.';
    //If your email body is HTML-based ($mail->isHTML(true)), the $mail->AltBody property ensures that recipients using plain-text email clients can still read the email content.
    // Send the email
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>
