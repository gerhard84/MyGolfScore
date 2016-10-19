<<?php
// Get Handicap by Player ID
    function get_handicap($player_id) {
    global $db;
    $query = 'SELECT handicap FROM handicap WHERE playerID = :player_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':player_id', $player_id);
        $statement->execute();
        $handicap = $statement->fetch();
        $statement->closeCursor();
    return $handicap;} catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

    function add_handicap($player_id) {
        global $db;
        $handicap = 24;
        $query = "INSERT INTO handicap
                            (playerID, handicap)
                    VALUES (:player_id, :handicap)";
        try {
        $statement = $db->prepare($query);
        $statement->bindValue(':player_id', $player_id);
        $statement->bindValue(':handicap', $handicap);
        $statement->execute();
        $statement->closeCursor();

        // Get the last course ID that was automatically generated
        $handicap_id = $db->lastInsertId();
        return $handicap_id;
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
        }
    }
 ?>
