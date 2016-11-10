<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
$player_id = 128;

$rounds = get_last_20_rounds_by_player($player_id);

if (count($rounds) > "5") {

//var_dump($rounds);

foreach ($rounds as $round) {
  $gross = $round['gross'];
  $slope = $round['slope'];
  $rating = $round['rating'];
  $holes = $round['holesPlayed'];
  $date = $round['playDate'];

//Calculate Differential for each round
  $dif[] = calc_hand_diff($gross, $slope, $rating, $holes);

  sort($dif);

  //$difCount = count($dif);
}
$difCount = count($dif);

  $numDifs = getNumDifs($difCount);

  // Get average of diffs to useDiff
  $sum = 0;
  for( $i = 0; $i < $numDifs; $i++){
  $sum += $dif[$i];
}

var_dump($dif);
//echo $sum;


$avg = ($sum/$numDifs) * 0.96;

//$handicap = floor($avg);

//$handicap = ceil($avg * 10)/10;

//truncate the result to the first decimal place
if($avg >= 0) $avg = floor($avg * 10) / 10;
else $avg = ceil($avg * 10)/10;

echo $avg . "</br>";
}

else {
  echo "Not enough rounds";
}

//echo $handicap;






 ?>
