<?php

require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');

global $db;
      $query = "UPDATE round SET net = (select gross-handicap from round_26_1)";
      try {
      $statement = $db->prepare($query);
      $statement->execute();


  } catch (PDOException $e) {
      $error_message = $e->getMessage();
      display_db_error($error_message);
  }


//echo "G" .$gross. " ". "N" .$net. " " ."H".$handicap. "</br>";


 ?>
