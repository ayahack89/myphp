<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;                     // Disable verbose debug output
    $mail->isSMTP();                          // Set mailer to use SMTP
    $mail->Host = 'localhost';                // Set the MailHog server address
    $mail->SMTPAuth = false;                  // No SMTP authentication is needed
    $mail->Port = 1025;                       // TCP port MailHog listens on

    // Recipients
    $mail->setFrom('andrewdanet66@gmail.com', 'Andrew');
    $mail->addAddress('ayanabhachatterjee@gmail.com', 'Ayanabha');  // Add a recipient

    // Content
    $mail->isHTML(true);                      // Set email format to HTML
    $mail->Subject = 'This is a test Email';
    $mail->Body    = 'Hi welcome to our site and<b>Enjoy : )</b>';
    $mail->AltBody = 'We are very glad that you join our community.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>