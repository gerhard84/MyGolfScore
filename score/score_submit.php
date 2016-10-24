<?php
require_once('../util/main.php');
require_once('model/course_db.php');
require_once('model/round_db.php');
$player_id = 10;
$course_id = 13;
//$courses = get_courses();
$rounds = get_rounds_per_player($player_id);
$course = get_course($course_id);
$courses = get_courses();

echo	'<pre>';
var_dump($rounds);
echo'</pre>';








?>
