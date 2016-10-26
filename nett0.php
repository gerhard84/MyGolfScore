<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');

function get_gross_hand() {
    global $db;
    $query = "SELECT `playerID`,`gross`, `handicap`
                FROM round";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

$grossArr = get_gross_hand();

echo var_dump($grossArr);


 foreach ($grossArr as $row) {

    $net = 2;
    //$net = $net + 1;
    $gross = $row['gross'];
    $handicap = $row['handicap'];
    $net = $gross - $handicap;

    global $db;
        $query = "UPDATE round
                    SET net = :net";
        try {
        $statement = $db->prepare($query);
        $statement->bindValue(':net', $net);
        $statement->execute();

        echo "G" .$gross. " ". "N" .$net. " " ."H".$handicap. "</br>";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

//$statement->execute();




 ?>
