<?php
include 'database_config.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; // Make sure you have installed PHPMailer using Composer

// Include config file
$config = include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $verification_code = rand(100000, 999999); // Generate a 6-digit numeric verification code

    
    // Insert user details into the database
    $stmt = $conn->prepare("INSERT INTO temporary_users (name, email, password, verification_code) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $verification_code);

    if ($stmt->execute()) {
        // Send verification email using PHPMailer
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
            $mail->addAddress($email); // Recipient email


            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification Code';
            $mail->Body = "Your email verification code is: <b>$verification_code</b>";

            // Send email
            $mail->send();

            // Redirect to verification form
            header("Location: verify_form.php?email=" . urlencode($email));
            exit();
        } catch (Exception $e) {
            // Handle email sending failure
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close database connection and prepared statement
    $stmt->close();
    $conn->close();
}
?>

<!-- Signup Form -->
<h2>Signup</h2>
<form method="POST" action="">
    <label for="name">Full Name:</label><br>
    <input type="text" id="name" name="name" placeholder="Full Name" required><br><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" placeholder="Email" required><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" placeholder="Password" required><br><br>
    
    <button type="submit">Signup</button>
</form>
