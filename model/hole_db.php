<?php
function get_holes($course_id) {
    global $db;
    $query = "SELECT *
                FROM holes p
                INNER JOIN courses c
                ON p.courseID = c.courseID
                WHERE p.courseID = :course_id";
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

function get_F9($course_id) {
    global $db;
    $query = "SELECT `holeID`, `holeNo`, `meters`, `par`, `stroke`
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

function get_B9($course_id) {
    global $db;
    $query = "SELECT `holeID`, `holeNo`, `meters`, `par`, `stroke`
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

function get_hole($hole_id) {
    global $db;
    $query = "SELECT *
                FROM holes h
                INNER JOIN courses c
                ON h.courseID = c.courseID
                WHERE holeID = :hole_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':hole_id', $hole_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_holes() {
    global $db;
    $keys = array_keys($_POST['holeNo']);
    foreach ( $keys as $key ) {
        $course_id = ($_POST['course_id']);
        $holeNo = ($_POST['holeNo'][$key]);
        $par = ($_POST['par'][$key]);
        $stroke = ($_POST['stroke'][$key]);
        $meters = ($_POST['meters'][$key]);
        $query = "INSERT INTO holes
                    (courseID,holeNo,par,stroke,meters)
                  VALUES
                    (:course_id, :holeNo, :par, :stroke, :meters)";

        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':holeNo', $holeNo);
        $statement->bindValue(':par', $par);
        $statement->bindValue(':stroke', $stroke);
        $statement->bindValue(':meters', $meters);
        $statement->execute();
    }
        try {
        $statement->closeCursor();
         //Get the last hole ID that was automatically generated
            $hole_id = $db->lastInsertId();
             return $hole_id;
         } catch (PDOException $e) {
             $error_message = $e->getMessage();
             display_db_error($error_message);
         }
     }

function edit_holes() {
    global $db;
    $keys = array_keys($_POST['holeNo']);
    foreach ( $keys as $key ) {
        $course_id = ($_POST['course_id']);
        $holeNo = ($_POST['holeNo'][$key]);
        $par = ($_POST['par'][$key]);
        $stroke = ($_POST['stroke'][$key]);
        $meters = ($_POST['meters'][$key]);
        $query = "UPDATE holes
                    SET holeNo = :holeNo,
                        par = :par,
                        stroke = :stroke,
                        meters = :meters,
                    WHERE holeID = 87";
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':holeNo', $holeNo);
        $statement->bindValue(':par', $par);
        $statement->bindValue(':stroke', $stroke);
        $statement->bindValue(':meters', $meters);
        $statement->execute();
    }
    try {
    $statement->closeCursor();
     //Get the last hole ID that was automatically generated
        $hole_id = $db->lastInsertId();
         return $hole_id;
     } catch (PDOException $e) {
         $error_message = $e->getMessage();
         display_db_error($error_message);
     }
 }


function update_hole($hole_id, $meters, $par, $stroke) {
    global $db;
    $query = "UPDATE holes
                SET meters = :meters,
                    par = :par,
                    stroke = :stroke
                    WHERE holeID = :hole_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':meters', $meters);
        $statement->bindValue(':par', $par);
        $statement->bindValue(':stroke', $stroke);
        $statement->bindValue(':hole_id', $hole_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_holes($course_id) {
    global $db;
    $query = 'DELETE FROM holes WHERE courseID = :course_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function get_si_F9($course_id) {
    global $db;
    $query = "SELECT `stroke`
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




function get_si_B9($course_id){
    global $db;
    $query = "SELECT `stroke`
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



?>
