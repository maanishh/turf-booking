

<?php 



require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'manishlakum4871@gmail.com';          // Your Gmail
    $mail->Password   = 'ptks lbpf tcpt hgrf';             // Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Sender and Recipient
    $mail->setFrom('manishlakum4871@gmail.com', 'truf booking system');
    $mail->addAddress('manishlakum4871@gmail.com', 'manish lakum');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email via Gmail SMTP';
    $mail->Body    = '<b>Hello!</b> This email was sent using PHPMailer with Gmail SMTP.';
    $mail->AltBody = 'Hello! This email was sent using PHPMailer with Gmail SMTP.';

    $mail->send();
    echo '✅ Email sent successfully!';
} catch (Exception $e) {
    echo "❌ Message could not be sent. Error: {$mail->ErrorInfo}";
}

?>