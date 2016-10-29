<?php
require_once('../util/main.php');
require_once('model/player_db.php');
require_once('model/hole_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/handicap_db.php');

if (isset($_POST['action'])) {
  $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
  $action = $_GET['action'];
} elseif (isset($_SESSION['user'])) {
  $action = 'view_rounds';
} else {
  $action = 'view_rounds';
}

switch ($action) {  

  case 'view_rounds':

    $aRounds = get_all_rounds();

    include 'rounds_view.php';
    break;

  case 'view_scorecard':
        $scorecard_id = $_POST['scorecardID'];
        $player_id = $_POST['playerID'];
        $course_id = $_POST['courseID'];
        $play_date = $_POST['roundDate'];
        $holes = $_POST['holes'];
        $date = $_POST['roundDate'];
        $handicap = $_POST['handicap'];
        $course = $_POST['course'];
        $playerRaw = get_player($player_id);
        $player_name =  $playerRaw['firstName']. " ". $playerRaw['lastName'];
        $front9 = get_F9($course_id);
        $back9 = get_B9($course_id);
        $roundInfo = get_round_score($scorecard_id);
        $net = $roundInfo[0]['net'];
        $gross = $roundInfo[0]['gross'];
        $f9Scores = array_slice($roundInfo, 0, 9);
        $b9Scores = array_slice($roundInfo, 9, 18);

        include 'scorecard_view.php';
        break;

  case 'logout':
  unset($_SESSION['user']);
  redirect('..');
  break;

  default:
  display_error("Unknown account action: " . $action);
  break;
}
?>
