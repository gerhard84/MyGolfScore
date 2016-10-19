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
    $query = 'INSERT INTO players (email, password,
                                    firstName, lastName, town)
                VALUES (:email, :password, :first_name,
                            :last_name, :town)';
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

function player_count() {
    global $db;
    $query = 'SELECT count(*) AS playerCount FROM players';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['playerCount'];
}

function increment_logins($email) {
    global $db;
    $query = "UPDATE players
                SET logins = logins+1
                WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function login_count($player_id) {
global $db;
$query = 'SELECT logins FROM players WHERE playerID = :player_id';
$statement = $db->prepare($query);
$statement->bindValue(':player_id', $player_id);
$statement->execute();
$result = $statement->fetch();
$statement->closeCursor();
return $result;
}

function player_search() {
// get the search term
$search_term = isset($_REQUEST['term']) ? $_REQUEST['term'] : "";

// write your query to search for data
$query = "SELECT
            playerID, firstName, lastName
        FROM
            players
        WHERE
            firstName LIKE '%{$search_term}%'
            OR
            lastName LIKE '%{$search_term}%'
        LIMIT 0,10";
$statement = $db->prepare($query);
$statement->execute();
// get the number of records returned
$num = $statement->rowCount();
if($num>0){
    // this array will become JSON later
    $data = array();
    // loop through the returned data
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data[] = array(
            'label' => $firstName . " " . $lastName,
            'value' => $playerID
        );
    }
    // convert the array to JSON
    echo json_encode($data);
}
//if no records found, display nothing
    else{
        die();
    }
}




?>
