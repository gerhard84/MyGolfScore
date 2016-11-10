<?php
require("util/PHPMailer/PHPMailerAutoload.php");

// Registration mail
function email_register($email, $first_name, $last_name) {
  $username = $first_name." ".$last_name;
  $message = file_get_contents('../util/PHPMailer/mail_templates/register.html');
  $message = str_replace('%username%', $username, $message);
  $mail = new PHPMailer;
  $mail->Host = 'smtp.@mygolfscore.co.za';
  $mail->SMTPAuth = true;
  $mail->Username = 'webmaster@mygolfscore.co.za';
  $mail->Password = 'G0lf$c0r3!@#123';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->setFrom('register@mygolfscore.co.za', 'My Golf Score');
  $mail->addAddress($email, $first_name." ".$last_name);
  $mail->addReplyTo('support@mygolfscore.co.za', 'Support');
  $mail->Subject = 'Registration - My Golf Score';
  $mail->Body    = $message;
  $mail->MsgHTML($message);
  $mail->IsHTML(true);
  $mail->CharSet="utf-8";
  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}

// Score submission email
function email_scorecard($gross, $net, $handicap, $email, $name, $cname, $play_date) {
  $message = file_get_contents('../util/PHPMailer/mail_templates/score_submit.html');
  $message = str_replace('%username%', $name, $message);
  $message = str_replace('%gross%', $gross, $message);
  $message = str_replace('%net%', $net, $message);
  $message = str_replace('%handicap%', $handicap, $message);
  $message = str_replace('%cname%', $cname, $message);
  $message = str_replace('%play_date%', $play_date, $message);
  $mail = new PHPMailer;
  $mail->Host = 'smtp.@mygolfscore.co.za';
  $mail->SMTPAuth = true;
  $mail->Username = 'webmaster@mygolfscore.co.za';
  $mail->Password = 'G0lf$c0r3!@#123';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->setFrom('score@mygolfscore.co.za', 'My Golf Score');
  $mail->addAddress($email, $name);
  $mail->addReplyTo('support@mygolfscore.co.za', 'Support');
  $mail->isHTML(true);
  $mail->Subject = 'Score submission - My Golf Score';
  $mail->Body    = $message;
  $mail->MsgHTML($message);
  $mail->IsHTML(true);
  $mail->CharSet="utf-8";
  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}

function email_contact($email, $name, $subject, $msg) {
  $message = file_get_contents('../util/PHPMailer/mail_templates/contact_submit.html');
  $message = str_replace('%username%', $name, $message);
  $message = str_replace('%subject%', $subject, $message);
  $message = str_replace('%msg%', $msg, $message);

  $mail = new PHPMailer;
  $mail->Host = 'smtp.@mygolfscore.co.za';
  $mail->SMTPAuth = true;
  $mail->Username = 'webmaster@mygolfscore.co.za';
  $mail->Password = 'G0lf$c0r3!@#123';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->setFrom('support@mygolfscore.co.za', 'My Golf Score - Support');
  $mail->addAddress('support@mygolfscore.co.za', 'My Golf Score - Support');
  $mail->addAddress($email, $name);
  $mail->addReplyTo('support@mygolfscore.co.za', 'My Golf Score - Support');
  $mail->isHTML(true);
  $mail->Subject = 'My Golf Score - Support';
  $mail->Body    = $message;
  $mail->MsgHTML($message);
  $mail->IsHTML(true);
  $mail->CharSet="utf-8";
  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}

?>
