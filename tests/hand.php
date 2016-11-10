<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');

$player_id = 10;

$rounds = get_last_20_rounds_by_player($player_id);

if (count($rounds) > "5") {

$hand = calc_handicap($rounds);

echo $hand;
}

else {
  echo "Not enough rounds";
}

?>
