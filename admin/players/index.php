<?php
require_once('../../util/main.php');
//require_once('util/secure_conn.php');
require_once('model/admin_db.php');
require_once('model/player_db.php');
include ('view/navbar_admin.php');

if (isset($_SESSION['user'])) {
    display_error('You cannot login to the admin section while ' .
                  'logged in as a customer.');
}

if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} elseif ( isset($_GET['action']) ) {
    $action = $_GET['action'];
} else {
    $action = 'view_players';
}

switch ($action) {

    case 'view_players':
        // Get all players from database
        $players = get_all_players();
        // View Players
        include 'player_view.php';
        break;
        
    case 'view_edit':
        // Get admin user data
        $player_id = intval($_POST['player_id']);
        $player = get_player($player_id);
        $first_name = $player['firstName'];
        $last_name = $player['lastName'];
        $email = $player['email'];
        $town = $player['town'];

        // Display Edit page
        include 'player_edit.php';
        break;
    case 'update_player':
        $player_id = intval($_POST['player_id']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $town = $_POST['town'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        update_player($player_id, $email, $first_name, $last_name,
            $password_1, $password_2, $town);

        redirect($app_path . 'admin/players');
        break;
    case 'view_delete_confirm':
        $player_id = intval($_POST['player_id']);

        $player = get_player($player_id);
        $first_name = $player['firstName'];
        $last_name = $player['lastName'];
        $email = $player['email'];
        include 'player_delete.php';
        break;
    case 'delete_player':
        $player_id = intval($_POST['player_id']);
        delete_player($player_id);
        redirect($app_path . 'admin/players');
        break;

    default:
        display_error('Unknown account action: ' . $action);
        break;
}
?>
