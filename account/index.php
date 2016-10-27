<?php
require_once('../util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');

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
            // Store POST data in local variables
            $email = $_POST['email'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $town = $_POST['town'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
            // Store data in the session
            $_SESSION['form_data'] = array();
            $_SESSION['form_data']['email'] = $email;
            $_SESSION['form_data']['first_name'] = $first_name;
            $_SESSION['form_data']['last_name'] = $last_name;
            $_SESSION['form_data']['town'] = $town;
            // Validate user data
            // TO DO Improve this validation
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
            //Create default handicap
            add_handicap($player_id);
            // Set up session data
            unset($_SESSION['form_data']);
            $_SESSION['user'] = get_player($player_id);
            redirect('.');
            break;
    case 'login':
                $email = $_POST['email'];
                $password = $_POST['password'];
                // If valid username/password, login
                if (is_valid_player_login($email, $password)) {
                    $_SESSION['user'] = get_player_by_email($email);
                    // Increment logins
                    increment_logins($email);
                } else {
                    display_error('Login failed. Invalid email or password.');
                }
            redirect('.');
        break;
    case 'view_profile':
        $player_name = $_SESSION['user']['firstName'] . ' ' .
                            $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['email'];
        $town = $_SESSION['user']['town'];
        $player_id = ($_SESSION['user']['playerID']);
        $logins = login_count($player_id);
        $rounds = get_rounds_by_player($player_id);
        $roundCount = round_count_player($player_id);
        include 'profile_view.php';
        break;
    case 'view_profile_edit':
        $first_name = $_SESSION['user']['firstName'];
        $last_name = $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['email'];
        $town = $_SESSION['user']['town'];
        include 'profile_edit.php';
        break;
    case 'update_account':
        // Get the player data
        $player_id = $_SESSION['user']['playerID'];
        $email = $_POST['email'];
        $town = $_POST['town'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        // Get the old data for the player
        $old_player = get_player($player_id);
        // Validate the data for the player
        if ($email != $old_player['email']) {
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
        display_error("Unknown account action: " . $action);
        break;
}
?>
