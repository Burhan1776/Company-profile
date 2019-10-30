<?php
include "classes/class.phpmailer.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
//$mail->SMTPSecure = "ssl";
// OR use TLS
$mail->SMTPSecure = 'ssl';
$mail->Port     = 465;
$mail->Username = "burhn123udin@gmail.com";
$mail->Password = "burhan061996";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("burhn123udin@gmail.com", "from name");
$mail->AddReplyTo("burhn123udin@gmail.com", "Infokoding");
$mail->AddAddress("burhn123udin@gmail.com");
$mail->Subject = "Tes email menggunakan PHP mailer";
$mail->WordWrap   = 80;
// $content = "<b>This is a test email using PHP mailer class.</b>";
$mail->MsgHTML($content);
$mail->IsHTML(true);
if (!$mail->Send())
    echo "Problem sending email.";
else
    echo "email sent.";
