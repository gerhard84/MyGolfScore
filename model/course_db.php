<?php
//Get array with all courses with full details and add holeCount
function get_courses() {
    global $db;
    $query = "SELECT courseID, courseName, city, province
              FROM courses
              ORDER BY courseName";
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
//Get specified course details
function get_course($course_id) {
    global $db;
    $query = "SELECT *
                FROM courses
                WHERE courseID = :course_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_course($name, $city, $province, $tel, $website, $email, $rating,
                    $slope, $parOut, $parIn, $parTotal, $mOut, $mIn, $mTotal)
                    {
    global $db;
    $query = "INSERT INTO courses
                 (courseName, city, province, tel, website, email, rating,
                    slope, parOut, parIn, parTotal, mOut, mIn, mTotal)
              VALUES
                 (:name, :city, :province, :tel, :website, :email, :rating,
                    :slope, :parOut, :parIn, :parTotal, :mOut, :mIn, :mTotal)";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':province', $province);
        $statement->bindValue(':tel', $tel);
        $statement->bindValue(':website', $website);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':slope', $slope);
        $statement->bindValue(':parOut', $parOut);
        $statement->bindValue(':parIn', $parIn);
        $statement->bindValue(':parTotal', $parTotal);
        $statement->bindValue(':mOut', $mOut);
        $statement->bindValue(':mIn', $mIn);
        $statement->bindValue(':mTotal', $mTotal);
        $statement->execute();
        $statement->closeCursor();

        // Get the last course ID that was automatically generated
        $course_id = $db->lastInsertId();
        return $course_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_course($course_id, $name, $city, $province, $tel, $website, $email, $rating,
                    $slope, $parOut, $parIn, $parTotal, $mOut, $mIn, $mTotal) {
    global $db;
    $query = "UPDATE courses
                SET courseName = :name,
                    city = :city,
                    province = :province,
                    tel = :tel,
                    website = :website,
                    email = :email,
                    rating = :rating,
                    slope = :slope,
                    parOut = :parOut,
                    parIn = :parIn,
                    parTotal = :parTotal,
                    mOut = :mOut,
                    mIn = :mIn,
                    mTotal = :mTotal
                WHERE courseID = :course_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':province', $province);
        $statement->bindValue(':tel', $tel);
        $statement->bindValue(':website', $website);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':slope', $slope);
        $statement->bindValue(':parOut', $parOut);
        $statement->bindValue(':parIn', $parIn);
        $statement->bindValue(':parTotal', $parTotal);
        $statement->bindValue(':mOut', $mOut);
        $statement->bindValue(':mIn', $mIn);
        $statement->bindValue(':mTotal', $mTotal);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function delete_course($course_id) {
    global $db;
    $query = "DELETE FROM courses
                WHERE courseID = :course_id";
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

function course_count() {
    global $db;
    $query = "SELECT count(*)
                AS courseCount
                FROM courses";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result['courseCount'];
}

?>
