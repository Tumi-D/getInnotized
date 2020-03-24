<?php

use PHPMailer\PHPMailer\PHPMailer;


function sendMail($content = "Just A simple message", $username = "Username", $subject = "A simple subject", $email = COMPANYMAIL, $link = '', $btn = 'Get In touch', $filepath = "")
{

    // Setting variables   
    $message = file_get_contents(APPROOT . '\views\email\defaultmail.php');
    $message = str_replace('%username%', $username, $message);
    $message = str_replace('%companyname%', COMPANYNAME, $message);
    $message = str_replace('%yourcontent%', $content, $message);
    $message = str_replace('%link%', URLROOT . $link, $message);
    $message = str_replace('%btnname%', $btn, $message);
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPKeepAlive = true;
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    // $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = SMTP_PREFIX; // secure transfer enabled REQUIRED for Gmail
    // $mail->Host = MAILHOST;
    $mail->Host = gethostbyname(MAILHOST);
    $mail->Port = MAILPORT; // or 587
    $mail->IsHTML(true);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username = MAILUSERNAME;
    $mail->Password = MAILPASSWORD;
    $mail->SetFrom(COMPANYMAIL, COMPANYNAME);
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    $mail->IsHTML(true);
    $mail->AddAddress($email);
    // if($filename) $email->AddAttachment('/var/www/html'.$filename); // attachment
    $mail->AltBody  = $content;
    // add attachment
    // $mail->addAttachment(URLROOT . 'home.txt');
    if (!$mail->Send()) {
        return  $mail;
        // return false;
    } else {
        return true;
    }
}
