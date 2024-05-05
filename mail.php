<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'imaneeddouni2000@gmail.com';   //SMTP write your email
        $mail->Password   = 'jlso uyqf qegq fmld';      //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit SSL encryption
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom($_POST["email"], $_POST["nom"]); // Sender Email and name
        $mail->addAddress('imaneeddouni2000@gmail.com');     //Add a recipient email  
        $mail->addReplyTo($_POST["email"], $_POST["nom"]); // reply to sender email

        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = $_POST["objet"];   // email subject headings
        $mail->Body    = $_POST["message"]; //email message

        // Success sent message alert
        $mail->send();
        echo
        "<script> 
     alert('Message was sent successfully!');
     document.location.href = 'index.php';
    </script>
    ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
