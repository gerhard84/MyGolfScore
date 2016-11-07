<?php
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
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    function update_handicap($player_id, $handicap) {
        global $db;
        $query = 'UPDATE handicap
                SET handicap = :handicap
                WHERE playerID = :player_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':player_id', $player_id);
            $statement->bindValue(':handicap', $handicap);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    function get_last_20_rounds_by_player($player_id) {
        global $db;
        $query = "SELECT r.playerID, s.scorecardID, c.courseID, gross, slope, rating, holesPlayed, playDate
                    FROM round r
                    INNER JOIN players p
                    ON r.playerID = p.playerID
                    INNER JOIN scorecard s
                    ON r.scorecardID = s.scorecardID
                    INNER JOIN courses c
                    ON s.courseID = c.courseID
                    WHERE holesPlayed = 18
                    AND r.playerID = :player_id
                    GROUP BY r.scorecardID
                    LIMIT 20";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':player_id', $player_id);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    // Calculate handicap differential for 18 hole rounds
    function calc_hand_diff($gross, $slope, $rating, $holes) {

            $diff = ($gross - $rating) * (113 / $slope);

        return $diff;

    }

    function getNumDifs($dif){
    switch($dif){
        case 5:
        case 6: return 1;
        break;
        case 7:
        case 8: return 2;
        break;
        case 9:
        case 10: return 3;
        break;
        case 11:
        case 12: return 4;
        break;
        case 13:
        case 14: return 5;
        break;
        case 15:
        case 16: return 6;
        break;
        case 17: return 7;
        break;
        case 18: return 8;
        break;
        case 19: return 9;
        break;
        case 20: return 10;
        break;
        }
    }

function calc_handicap($rounds) {

    foreach ($rounds as $round) {
      $gross = $round['gross'];
      $slope = $round['slope'];
      $rating = $round['rating'];
      $holes = $round['holesPlayed'];
      $date = $round['playDate'];
    //Calculate Differential for each round
      $dif[] = calc_hand_diff($gross, $slope, $rating, $holes);
      sort($dif);
    }
    // Count differentials
    $difCount = count($dif);
    // Get amount of differentials to use
    $numDifs = getNumDifs($difCount);

    // Sum all differentials
    $sum = 0;
    for( $i = 0; $i < $numDifs; $i++){
    $sum += $dif[$i];
    }
    //Calculate average of differentials
    $avg = ($sum/$numDifs) * 0.96;

    //truncate the result to the first decimal place
    if($avg >= 0) $avg = floor($avg * 10) / 10;
    else $avg = ceil($avg * 10)/10;

    return $avg;

}




 ?>
