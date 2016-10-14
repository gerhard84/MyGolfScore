<?php

function get_F9_score($course_id) {
    global $db;
    $query = "SELECT `holeNo`, `meters`, `par`, `stroke`
                FROM holes h
                INNER JOIN courses c
                ON h.courseID = c.courseID
                WHERE h.courseID = :course_id
                AND holeNo <= 9";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_B9_score($course_id) {
    global $db;
    $query = "SELECT `holeNo`, `meters`, `par`, `stroke`
                FROM holes h
                INNER JOIN courses c
                ON h.courseID = c.courseID
                WHERE h.courseID = :course_id
                AND holeNo > 9";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_scorecard($course_id, $play_date, $holes_played) {
    global $db;

    $query = "INSERT INTO scorecard (courseID, playDate, holesPlayed)
                VALUES (:course_id, :play_date, :holes_played)";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':play_date', $play_date);
        $statement->bindValue(':holes_played', $holes_played);
        $statement->execute();
        $statement->closeCursor();

        $scorecard_id = $db->lastInsertId('scorecard');
        return $scorecard_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_round($scorecard_id, $player_id, $handicap) {
    global $db;
    $keys = array_keys($_POST['holeNo']);
    foreach ( $keys as $key ) {
        $holeNo = ($_POST['holeNo'][$key]);
        $score = ($_POST['score'][$key]);

    $query = 'INSERT INTO round (playerID, scorecardID,
                                hole, score, handicap)
                VALUES (:player_id, :scorecard_id,
                            :hole, :score, :handicap)';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->bindValue(':scorecard_id', $scorecard_id);
    //$statement->bindValue(':gross', $gross);
    //$statement->bindValue(':net', $net);
    $statement->bindValue(':hole', $holeNo);
    $statement->bindValue(':score', $score);
    $statement->bindValue(':handicap', $handicap);
    $statement->execute();
    }

    try {
    $statement->closeCursor();
     //Get the last hole ID that was automatically generated
        $round_id = $db->lastInsertId();
         return $round_id;
     } catch (PDOException $e) {
         $error_message = $e->getMessage();
         display_db_error($error_message);
     }
    }

function get_rounds_by_player_id($player_id) {
    global $db;
    $query = 'SELECT * FROM round WHERE playerID = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $rounds = $statement->fetchAll();
    $statement->closeCursor();
    return $rounds;
}

function delete_round($round_id) {
    global $db;
    $query = 'DELETE FROM round WHERE roundID = :$round_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':$round_id', $$round_id);
    $statement->execute();
    $statement->closeCursor();
}

 function rounds_count() {
     global $db;
     $query = 'SELECT count(*) AS roundsCount FROM round';
     $statement = $db->prepare($query);
     $statement->execute();
     $result = $statement->fetch();
     $statement->closeCursor();
     return $result['roundsCount'];
 }

function calculate_gross() {

}

?>
