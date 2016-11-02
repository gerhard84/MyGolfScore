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

function add_round($scorecard_id, $player_id, $gross, $net, $handicap) {
    global $db;
    $keys = array_keys($_POST['holeNo']);
    foreach ( $keys as $key ) {
        $holeNo = ($_POST['holeNo'][$key]);
        $score = ($_POST['score'][$key]);
        $query = 'INSERT INTO round (playerID, scorecardID, gross,
                                        net, hole, score, handicap)
                    VALUES (:player_id, :scorecard_id, :gross,
                                :net, :hole, :score, :handicap)';
                $statement = $db->prepare($query);
                $statement->bindValue(':player_id', $player_id);
                $statement->bindValue(':scorecard_id', $scorecard_id);
                $statement->bindValue(':gross', $gross);
                $statement->bindValue(':net', $net);
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

function get_rounds_by_player($player_id) {
    global $db;
    $query = "SELECT r.playerID, s.scorecardID, c.courseID, roundID, gross, net,
                    handicap, firstName, lastName, holesPlayed, courseName, playDate
                FROM round r
                INNER JOIN players p
                ON r.playerID = p.playerID
                INNER JOIN scorecard s
                ON r.scorecardID = s.scorecardID
                INNER JOIN courses c
                ON s.courseID = c.courseID
                WHERE r.playerID = :player_id
                GROUP BY r.scorecardID
                ORDER BY playDate";
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

function graph_rounds_by_player($player_id) {
    global $db;
    $query = "SELECT r.playerID, s.scorecardID, c.courseID, roundID, gross, net,
                    handicap, firstName, lastName, holesPlayed, courseName, playDate
                FROM round r
                INNER JOIN players p
                ON r.playerID = p.playerID
                INNER JOIN scorecard s
                ON r.scorecardID = s.scorecardID
                INNER JOIN courses c
                ON s.courseID = c.courseID
                WHERE r.playerID = :player_id
                GROUP BY r.scorecardID
                ORDER BY playDate
                LIMIT 15";
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

function get_all_rounds() {
    global $db;
    $query = "SELECT p.playerID, s.scorecardID, c.courseID, roundID, gross, net,
                    handicap, firstName, lastName, holesPlayed, courseName, playDate
                FROM round r
                INNER JOIN players p
                ON r.playerID = p.playerID
                INNER JOIN scorecard s
                ON r.scorecardID = s.scorecardID
                INNER JOIN courses c
                ON s.courseID = c.courseID
                GROUP BY r.scorecardID
                ORDER BY playDate";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
function delete_round($round_id) {
    global $db;
    $query = 'DELETE FROM round
                WHERE roundID = :round_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':round_id', $round_id);
    $statement->execute();
    $statement->closeCursor();
}

function rounds_count() {
    global $db;
    $query = 'SELECT count(*)
                AS roundsCount
                FROM round';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['roundsCount'];
}

function calc_net($gross, $holes_played, $handicap) {
    if ($holes_played <= 9) {
        $result =  $gross - ($handicap / 2);
    }
    else
    {
        $result = $gross - $handicap;
    }
    return $result;
}

function get_round_score($scorecard_id){
  global $db;
  $query = "SELECT  gross, net, score
            FROM round
            WHERE scorecardID = :scorecard_id";
      try {
            $statement = $db->prepare($query);
            $statement->bindValue(':scorecard_id', $scorecard_id);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
      }


?>
