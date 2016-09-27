<?php
// Validate email
function is_valid_player_email($email) {
    global $db;
    $query = '
        SELECT playerID FROM players
        WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

// Validate Login
function is_valid_player_login($email, $password) {
    global $db;
    $password = sha1($email . $password);
    $query = '
        SELECT * FROM players
        WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

// Get Player by ID
    function get_player($player_id) {
    global $db;
    $query = 'SELECT * FROM players WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player;
}

// Get Player by email
function get_player_by_email($email) {
    global $db;
    $query = 'SELECT * FROM players WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player;
}

// Add player
function add_player($email, $first_name, $last_name,
                      $password_1, $password_2, $town) {
    global $db;
    $password = sha1($email . $password_1);
    $query = '
        INSERT INTO players (email, password, firstName, lastName, town)
        VALUES (:email, :password, :first_name, :last_name, :town)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':town', $town);
    $statement->execute();
    $player_id = $db->lastInsertId();
    $statement->closeCursor();
    return $player_id;
}

function update_player($player_id, $email, $first_name, $last_name,
                      $password_1, $password_2, $town) {
    global $db;
    $query = '
        UPDATE players
        SET email = :email,
            firstName = :first_name,
            lastName = :last_name,
            town = :town
        WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':town', $town);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();

    if (!empty($password_1) && !empty($password_2)) {
        $password = sha1($email . $password_1);
        $query = '
            UPDATE players
            SET password = :password
            WHERE playerID = :player_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':player_id', $player_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>