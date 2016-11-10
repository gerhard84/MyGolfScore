<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');
require_once('model/email.php');

$email = 'gerhard.g84@gmail.com';
$name = 'Gerhard';
$subject = 'Test';
$msg = 'Message';


email_contact($email, $name, $subject, $msg);

//echo $cname;
//echo $name;
//echo $email;

//email_scorecard($gross, $net, $handicap, $email, $name, $cname, $play_date);




 ?>
