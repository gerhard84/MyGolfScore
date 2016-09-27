<?php
require_once('../util/main.php');
//require_once('util/secure_conn.php');

require_once('model/player_db.php');
//require_once('model/address_db.php');
//require_once('model/round_db.php');
//require_once('model/hole_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_SESSION['user'])) {
    $action = 'view_profile';
} else {
    $action = 'view_login';
}

switch ($action) {
    case 'view_login':
        include 'profile_login_register.php';
        break;

    case 'view_register':
        include 'profile_register.php';
        break;

    case 'register':
        // Store user data in local variables
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $town = $_POST['town'];

        // Store data in the session
        $_SESSION['form_data'] = array();
        $_SESSION['form_data']['email'] = $email;
        $_SESSION['form_data']['first_name'] = $first_name;
        $_SESSION['form_data']['last_name'] = $last_name;
        $_SESSION['form_data']['town'] = $town;

        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Validate user data
        // TODO: Improve this validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            display_error('The e-mail address ' . $email . ' is not valid.');
        } elseif (is_valid_player_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        if (empty($first_name)) {
            display_error('First name is a required field.');
        }
        if (empty($last_name)) {
            display_error('Last name is a required field.');
        }
        if (empty($town)) {
            display_error('Town is a required field.');
        }
        if (empty($password_1) || empty($password_2)) {
            display_error('Password is a required field.');
        } elseif ($password_1 !== $password_2) {
            display_error('Passwords do not match.');
        } elseif (strlen($password_1) < 6) {
            display_error('Password must be at least six characters.');
        }


        // Add the player data to the database
        $player_id = add_player($email, $first_name,
                                    $last_name, $password_1, $password_2, $town);

        // Set up session data
        unset($_SESSION['form_data']);
        $_SESSION['user'] = get_player($player_id);

//UNSURE
        redirect('.');
//UNSURE
        break;


    case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        // If valid username/password, login
        // TODO: Improve this validation
        if (is_valid_player_login($email, $password)) {
            $_SESSION['user'] = get_player_by_email($email);
        } else {
            display_error('Login failed. Invalid email or password.');
        }
//UNSURE
        redirect('.');
//UNSURE
        break;


    case 'view_profile':
        $player_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['emailAddress'];


        $rounds = get_rounds_by_player_id($_SESSION['user']['playerID']);

        include 'profile_view.php';
        break;


    // case 'view_round':
    //     $round_id = $_GET['round_id'];
    //     $round = get_round($round_id);
    //     $round_date = strtotime($round['roundDate']);
    //     $round_date = date('M j, Y', $round_date);
    //     $round_items = get_round_items($round_id);
    //     include 'profile_view_round.php';
    //     break;


    case 'view_profile_edit':
        $first_name = $_SESSION['user']['firstName'];
        $last_name = $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['emailAddress'];
        include 'profile_edit.php';
        break;

    case 'update_profile':
        // Get the player data
        $player_id = $_SESSION['user']['playerID'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $town = $_POST['town'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Get the old data for the player
        $old_player = get_player($player_id);

        // Validate the data for the player
        if ($email != $old_player['emailAddress']) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                display_error('The e-mail address ' . $email . ' is not valid.');
            } elseif (is_valid_player_email($email)) {
                display_error('The e-mail address ' . $email . ' is already in use.');
            }
        }
        if (empty($first_name)) {
            display_error('First name is a required field.');
        }
        if (empty($last_name)) {
            display_error('Last name is a required field.');
        }
        if (empty($town)) {
            display_error('Town is a required field.');
        }

        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {
            if ($password_1 !== $password_2) {
                display_error('Passwords do not match.');
            } elseif (strlen($password_1) < 6) {
                display_error('Password must be at least six characters.');
            }
        }

        // Update the player data
        update_player($player_id, $email, $first_name, $last_name,
            $password_1, $password_2, $town);

        // Set the new player data in the session
        $_SESSION['user'] = get_player($player_id);

        redirect('.');
        break;
    case 'logout':
        unset($_SESSION['user']);
        redirect('..');
        break;
    default:
        display_error("Unknown profile action: " . $action);
        break;
}
?>
