<?php
require_once('util/main.php');
include 'model/round_db.php';
$scorecard_id = 82;


 ?>




<?php


$roundInfo = get_round_score($scorecard_id);
    $net = $roundInfo[0]['net'];
    $gross = $roundInfo[0]['gross'];




 ?>

 <?php
 //echo $net;
 echo	'<pre>';
 var_dump($gross);
 echo'</pre>';
 ?>
