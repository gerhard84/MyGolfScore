<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../util/main.php');
//require_once('util/secure_conn.php');

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
    $action = 'view_submit_details';
} else {
    $action = 'login';
}

switch ($action) {

    case 'login':
            redirect('../account/index.php');
        break;

    case 'view_submit_details':
        include 'score_submit_details.php';
        break;

    case 'view_submit_data':
        $player_id = $_POST['playerID'];
        $player = $_POST['player'];
        $course_id = $_POST['courseID'];
        $course = $_POST['course'];
        $date = $_POST['roundDate'];
        $holes = $_POST['holes'];
        $handicap = get_handicap($player_id);
        $front9 = get_F9($course_id);
        $back9 = get_B9($course_id);

        include 'score_submit_data.php';
        break;

    case 'submit_score':
    $course_id = $_POST['courseID'];
    $play_date = $_POST['roundDate'];
    $holes_played = $_POST['holes'];
    $player_id = $_POST['playerID'];
    $handicap = $_POST['handicap'];

    // echo	'<pre>';
    // var_dump($_POST);
    // echo'</pre>';
    //
    // break;

    $gross = array_sum($_POST['score']);

    $net = calc_net($gross, $holes_played, $handicap);

    $scorecard_id = add_scorecard($course_id, $play_date, $holes_played);

    add_round($scorecard_id, $player_id, $gross, $net, $handicap);

    redirect($app_path . 'score');

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
