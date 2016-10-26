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

if ( admin_count() == 0 ) {
    if ( $_POST['action'] == 'create' ) {
        $action = 'create';
    } else {
        $action = 'view_account';
    }
} elseif ( isset($_SESSION['admin']) ) {
    if ( isset($_POST['action']) ) {
        $action = $_POST['action'];
    } elseif ( isset($_GET['action']) ) {
        $action = $_GET['action'];
    } else {
        $action = 'view_players';
    }
} elseif ($_POST['action'] == 'login') {
    $action = 'login';
} else {
    $action = 'view_login';
}

switch ($action) {
    case 'view_login':
        include 'account_login.php';
        break;
    case 'login':
        // Get username/password
        $email = $_POST['email'];
        $password = $_POST['password'];

        // If valid username/password, log in
        if (is_valid_admin_login($email, $password)) {
            $_SESSION['admin'] = get_admin_by_email($email);
        } else {
            display_error('Login failed. Invalid email or password.');
        }

        // Display Admin Menu page
        redirect('..');
        break;

    case 'view_players':
        // Get admin user data from session
        $name = $_SESSION['admin']['firstName'] . ' ' .
                $_SESSION['admin']['lastName'];
        $email = $_SESSION['admin']['email'];
        $admin_id = $_SESSION['admin']['adminID'];

        // Get all accounts from database
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

        //if ($admin_id == $_SESSION['admin']['adminID']) {
        //    $_SESSION['admin'] = get_admin($admin_id);
        //}
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
    case 'logout':
        unset($_SESSION['admin']);
        redirect($app_path . 'admin/account');
        break;
    default:
        display_error('Unknown account action: ' . $action);
        break;
}
?>
