<?php 

// function sendEmail($senderemail, $receiveremail, $subject, $message, $customer) {
//     $error = 'Error';
//     $success = 'Success';
// ​
//     $mail  = new PHPMailer\PHPMailer\PHPMailer();
//     $mail->IsSMTP();
//     $mail->SMTPAuth   = true;
//     $mail->SMTPSecure = SMTP_PREFIX;
//     $mail->Host       = SMTP_HOST;
//     $mail->Port       = SMTP_PORT;
//     $mail->Username   = MAIL_USERNAME;
//     $mail->Password   = MAIL_PASSWORD;
// ​
//     $mail->From= $senderemail;
//     $mail->FromName= $customer;
//     $mail->Sender= $senderemail;
// ​
//     $mail->AddAddress($receiveremail);
//     $mail->Subject = $subject;
// ​
//     $mail->IsHTML(true);
//     $mail->Body = $message;
// ​
//     if (!$mail->Send()) {
//         return $mail->ErrorInfo;
//     } else {
//         return  $success;
//     }
// }
