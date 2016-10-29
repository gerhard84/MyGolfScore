<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');
require_once('model/email.php');




$gross = 85;
$net = 75;
$handicap = 10;

$course_id = 14;
$player_id = 101;
$course = get_course($course_id);
$cname = $course['courseName'];
$player = get_player($player_id);
$name = $player['firstName']." ".$player['lastName'];
$email = $player['email'];

echo $cname;
echo $name;
echo $email;

//email_scorecard($gross, $net, $handicap, $email, $name, $cname, $play_date);




 ?>
