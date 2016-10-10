<<?php
// Get Handicap by Player ID
    function get_handicap($player_id) {
    global $db;
    $query = 'SELECT handicap FROM handicap WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $handicap = $statement->fetch();
    $statement->closeCursor();
    return $handicap;
}
























 ?>
