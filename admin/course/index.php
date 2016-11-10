<?php
require_once('../../util/main.php');
require_once('util/valid_admin.php');
require_once('model/admin_db.php');
require_once('model/hole_db.php');
require_once('model/course_db.php');

if (isset($_SESSION['user'])) {
    display_error('You cannot login to the admin section while ' .
                  'logged in as a player.');
}

if ( isset($_SESSION['admin']) ) {
    if ( course_count() == 0 ) {
        $action = 'course_add';
    if ( $_POST['action'] == 'course_add' ) {
        $action = 'course_add';
    } else {
        $action = 'course_list';
    }
}elseif (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'course_list';
    }
} else {
    $action = 'course_list';
}

switch ($action) {
    case 'course_list':
        $courses = get_courses();
        include('course_list.php');
        break;

    case 'course_view_add':

    // Display Add page
    include 'course_add.php';
    break;

    case 'course_add':
        $name = $_POST['name'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $tel = $_POST['tel'];
        $website = $_POST['website'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $slope = $_POST['slope'];
        $parOut = $_POST['parOut'];
        $parIn = $_POST['parIn'];
        $parTotal = $_POST['parTotal'];
        $mOut = $_POST['mOut'];
        $mIn = $_POST['mIn'];
        $mTotal = $_POST['mTotal'];

        // Validate inputs
        if (empty($name) || empty($city) || empty($province) ) {
            display_error('Invalid course data.
                      Check all fields and try again.');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            display_error('The e-mail address ' . $email . ' is not valid.');
        }
        if (!is_numeric($tel) || !is_numeric($rating) || !is_numeric($slope) || !is_numeric($parOut)
                                || !is_numeric($parIn) || !is_numeric($parTotal) || !is_numeric($mOut)
                                 || !is_numeric($mIn) || !is_numeric($mTotal) ) {
            display_error('You must include a numeric number for the course data.
                           Please try again.');
        }
        // Create course
        else {
            $course_id = add_course($name, $city, $province, $tel, $website, $email, $rating,
                                    $slope, $parOut, $parIn, $parTotal, $mOut, $mIn, $mTotal);
        }
        header("Location: .");
        break;

    case 'course_view_edit':
        // Get course data
        $course_id = intval($_POST['course_id']);
        $course = get_course($course_id);
        $name = $course['courseName'];
        $city = $course['city'];
        $province = $course['province'];
        $tel = $course['tel'];
        $website = $course['website'];
        $email = $course['email'];
        $rating = $course['rating'];
        $slope = $course['slope'];
        $parOut = $course['parOut'];
        $parIn = $course['parIn'];
        $parTotal = $course['parTotal'];
        $mOut = $course['mOut'];
        $mIn = $course['mIn'];
        $mTotal = $course['mTotal'];
        // Display Edit page
        include 'course_edit.php';
        break;

    case 'course_edit':
        $course_id =  intval($_POST['course_id']);
        // Validate inputs
        if (empty($_POST['name']) || empty($_POST['city']) || empty($_POST['province']) )
            {
            display_error('Invalid course data.
                      Check all fields and try again.');
                  }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
            display_error('The e-mail address ' . $email . ' is not valid.');
                    }
        if (!is_numeric($_POST['tel']) || !is_numeric($_POST['rating']) || !is_numeric($_POST['slope'])
                                        || !is_numeric($_POST['parOut']) || !is_numeric($_POST['parIn'])
                                        || !is_numeric($_POST['parTotal']) || !is_numeric($_POST['mOut'])
                                        || !is_numeric($_POST['mIn']) || !is_numeric($_POST['mTotal']) )
            {
            display_error('You must include a numeric number for the course data.
                           Please try again.');
                       }
        // Update course
        else {
                update_course(
                $course_id, $_POST['name'], $_POST['city'], $_POST['province'],
                $_POST['tel'], $_POST['website'], $_POST['email'], $_POST['rating'],
                $_POST['slope'], $_POST['parOut'], $_POST['parIn'], $_POST['parTotal'],
                $_POST['mOut'], $_POST['mIn'], $_POST['mTotal']
                );
            }
            header("Location: .");
        break;

    case 'course_view_delete_confirm':
        $course_id = intval($_POST['course_id']);
        $course = get_course($course_id);
        $name = $course['courseName'];
        $city = $course['city'];
        $province = $course['province'];
        $tel = $course['tel'];
        $website = $course['website'];
        $email = $course['email'];
        $rating = $course['rating'];
        $slope = $course['slope'];
        $parOut = $course['parOut'];
        $parIn = $course['parIn'];
        $parTotal = $course['parTotal'];
        $mOut = $course['mOut'];
        $mIn = $course['mIn'];
        $mTotal = $course['mTotal'];
        include 'course_delete.php';
        break;

    case 'course_delete':
        $course_id = intval($_POST['course_id']);
        delete_course($course_id);
        header("Location: .");
        break;

    case 'holes_view_add':
        $course_id = intval($_POST['course_id']);
        $course = get_course($course_id);
        // Display Add page
        include 'holes_add.php';
        break;

    case 'holes_add':
            add_holes();
            header("Location: .");
        break;

    case 'holes_view_edit':
        // Get course data
        $course_id = intval($_POST['course_id']);
        $course = get_course($course_id);
        $courseName = $course['courseName'];
        $holesF9 = get_F9($course_id);
        $holesB9 = get_B9($course_id);

        // Display Edit page
        include 'holes_edit.php';
        break;

    case 'hole_view_edit':
        // Get course data
        $course_id = intval($_POST['course_id']);
        $course = get_course($course_id);
        $hole_id = intval($_POST['hole_id']);
        $hole = get_hole($hole_id);
        $courseName = $course['courseName'];
        $holesF9 = get_F9($course_id);
        $holesB9 = get_B9($course_id);
        // Display Edit page
        include 'hole_edit.php';
        break;

    case 'hole_edit':
        $course_id =  intval($_POST['course_id']);
        $hole_id = intval($_POST['hole_id']);
        $meters = intval($_POST['meters']);
        $par = intval($_POST['par']);
        $stroke = intval($_POST['stroke']);
        update_hole($hole_id, $meters, $par, $stroke);
        header("Location: .");
        break;

    case 'holes_view_delete_confirm':
        $course_id = intval($_POST['course_id']);
        $course = get_course($course_id);
        $courseName = $course['courseName'];
        include 'holes_delete.php';
        break;

    case 'holes_delete':
        $course_id = intval($_POST['course_id']);
        delete_holes($course_id);
        header("Location: .");
        break;

    default:
        display_error('Unknown action, please try again: ' . $action);
        break;
}
?>
