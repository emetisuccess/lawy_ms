<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';


if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // check for empty fields;
    if (
        empty($name) or empty($subject)
        or empty($email) or empty($message)
    ) {
        echo "<span class='text-danger text-center'>All Fields Are Required</span>";
    } else {

        // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->Username = 'a6501e4ca437da'; // YOUR gmail email
            $mail->Password = '2e8fa7e22d2644'; // YOUR gmail password
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            // Sender and recipient settings
            $mail->setFrom($email, $name);
            $mail->addAddress('emetisuccess@gmail.com', 'Emeti Etim');
            $mail->addReplyTo($email, $name); // to set the reply to

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;


            $mail->send();

            echo "<p class='text-success text-center'>Message Successfully Sent.</p>";
        } catch (Exception $e) {

            echo "<p class='text-danger text-center'>Failed To Send Mail</p>";
            exit();
        }
    }
}