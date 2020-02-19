<?php

use PHPMailer\PHPMailer\PHPMailer;


function sendMail($content = "Just A simple message", $username = "Username", $subject = "A simple subject", $email = TESTMAIL, $path = '')
{

    // Setting variables   
    $message = file_get_contents(APPROOT . '\views\inc\email_templates\defaultmail.php');
    $message = str_replace('%username%', $username, $message);
    $message = str_replace('%companyname%', COMPANYNAME, $message);
    $message = str_replace('%yourcontent%', $content, $message);
    $message = str_replace('%link%', URLROOT . $path, $message);
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = MAILHOST;
    $mail->Port = MAILPORT; // or 587
    $mail->IsHTML(true);
    $mail->Username = MAILUSERNAME;
    $mail->Password = MAILPASSWORD;
    $mail->SetFrom('umo@gmail.com', COMPANYNAME);
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    $mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set. 
    $mail->AddAddress($email);
    // if($filename) $email->AddAttachment('/var/www/html'.$filename); // attachment
    $mail->AltBody  = $content;
    # This automatically sets the email to multipart/alternative. This body can be read by mail clients that do not have HTML email capability such as mutt.
    // add attachment
    // $mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
    if (!$mail->Send()) {
        return  $mail->ErrorInfo;
    } else {
        return "true";
    }
}
