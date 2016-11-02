<?php
require_once('../../util/main.php');
//require_once('util/secure_conn.php');
require_once('util/valid_admin.php');
//require_once('util/images.php');
//require_once('model/product_db.php');
//require_once('model/category_db.php');
require_once('model/support_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_support';
}

switch ($action) {
  case 'list_support':
      $tickets = get_tickets();
      include('support_list.php');
      break;

  case 'support_view_edit':
      // Get course data
      $ticket_id = intval($_POST['ticket_id']);
      $ticket = get_ticket($ticket_id);
      $date = $ticket['date'];
      $email = $ticket['email'];
      $name = $ticket['name'];
      $subject = $ticket['subject'];
      $msg = $ticket['message'];
      $status = $ticket['status'];
      $note_1 = $ticket['note_1'];
      $note_2 = $ticket['note_2'];
      $note_3 = $ticket['note_3'];
      $note_final = $ticket['note_final'];
      // Display Edit page
      include 'support_edit.php';
      break;

    case 'add_note':

        if (isset($_POST['note1'])) {
          $note_1 = $_POST['note1'];
          $ticket_id = $_POST['ticket_id'];
          add_note1($ticket_id, $note_1);

        } else if (isset($_POST['note2'])) {
          $note_2 = $_POST['note2'];
          $ticket_id = $_POST['ticket_id'];
          add_note2($ticket_id, $note_2);

        } else if (isset($_POST['note3'])) {
          $note_3 = $_POST['note3'];
          $ticket_id = $_POST['ticket_id'];
          add_note3($ticket_id, $note_3);

        } else {
          $note_final = $_POST['noteFinal'];
          $ticket_id = $_POST['ticket_id'];

          add_final($ticket_id, $note_final);
        }

        redirect($app_path . 'admin/support');

        break;    

}
?>
