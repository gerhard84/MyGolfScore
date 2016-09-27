<?php
function get_holes_by_course($course_id) {
    global $db;
    $query = '
        SELECT *
        FROM holes p
           INNER JOIN courses c
           ON p.courseID = c.courseID
        WHERE p.courseID = :course_id';
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
    $query = '
        SELECT *
        FROM holes h
           INNER JOIN courses c
           ON h.courseID = c.courseID
       WHERE holeID = :hole_id';
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


function add_hole($course_id, $code, $name, $description,
        $price, $discount_percent) {
    global $db;
    $query = 'INSERT INTO holes
                 (courseID,holeNo,par,stroke,meters)
              VALUES
                 (:course_id, :code, :name, :description, :price,
                  :discount_percent, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount_percent', $discount_percent);
        $statement->execute();
        $statement->closeCursor();

        // Get the last hole ID that was automatically generated
        $hole_id = $db->lastInsertId();
        return $hole_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_hole($hole_id, $code, $name, $desc,
                        $price, $discount, $course_id) {
    global $db;
    $query = '
        UPDATE Holes
        SET holeName = :name,
            holeCode = :code,
            description = :desc,
            listPrice = :price,
            discountPercent = :discount,
            courseID = :course_id
        WHERE holeID = :hole_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount', $discount);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':hole_id', $hole_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_hole($hole_id) {
    global $db;
    $query = 'DELETE FROM holes WHERE holeID = :hole_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':hole_id', $hole_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>
