<?php

$name  = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

function build_table($array)
{
  $html = '<table>';
  $html .= '<tr>';
  foreach ($array[0] as $key => $value) {
    $html .= '<th>' . htmlspecialchars($key) . '</th>';
  }
  $html .= '</tr>';

  foreach ($array as $key => $value) {
    $html .= '<tr>';
    foreach ($value as $key2 => $value2) {
      $html .= '<td>' . htmlspecialchars($value2) . '</td>';
    }
    $html .= '</tr>';
  }

  $html .= '</table>';
  return $html;
}

$content = array(
  array(
    'nama' => $name,
    'email' => $email,
    'phone' => $phone,
    'pesan' => $message
  )
);

$data = build_table($content);

require 'phpkrimemail/classes/class.phpmailer.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 0;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "pemudacintadawah@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "burhan1776";

//Set who the message is to be sent from
$mail->setFrom('pemudacintadawah@gmail.com', 'Form Web');

//Set an alternative reply-to address
$mail->addReplyTo('no_reply@webapps.com', 'First Last');

$mail->AddAddress("udinb1776@gmail.com");

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->msgHTML($data);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
