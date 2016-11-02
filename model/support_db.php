<?php

function get_tickets() {
    global $db;
    $query = "SELECT supportID, DATE_FORMAT(date,'%d/%m/%Y') AS date, email, name, subject, status
              FROM support
              ORDER BY status,
                        date";
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

function get_ticket($ticket_id) {
    global $db;
    $query = "SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS date
                FROM support
                WHERE supportID = :ticket_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ticket_id', $ticket_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

// Add support ticket
function add_support($email, $name, $subject, $msg) {
    global $db;
    $query = 'INSERT INTO support
                            (email, name, subject, message)
                        VALUES
                            (:email, :name, :subject, :message)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':subject', $subject);
    $statement->bindValue(':message', $msg);
    $statement->execute();
    $support_id = $db->lastInsertId();
    $statement->closeCursor();
    return $support_id;
}

function add_note1($ticket_id, $note_1) {
  global $db;
  $query = 'UPDATE support
            SET note_1 = :note_1
            WHERE supportID = :ticket_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':note_1', $note_1);
        $statement->bindValue(':ticket_id', $ticket_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
  }

  function add_note2($ticket_id, $note_2) {
    global $db;
    $query = 'UPDATE support
              SET note_2 = :note_2
              WHERE supportID = :ticket_id';
      try {
          $statement = $db->prepare($query);
          $statement->bindValue(':note_2', $note_2);
          $statement->bindValue(':ticket_id', $ticket_id);
          $statement->execute();
          $statement->closeCursor();
      } catch (PDOException $e) {
          $error_message = $e->getMessage();
          display_db_error($error_message);
      }
    }

    function add_note3($ticket_id, $note_3) {
      global $db;
      $query = 'UPDATE support
                SET note_3 = :note_3
                WHERE supportID = :ticket_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':note_3', $note_3);
            $statement->bindValue(':ticket_id', $ticket_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
      }

      function add_final($ticket_id, $note_final) {
        $status = 'Closed';        
        global $db;
        $query = 'UPDATE support
                  SET note_final = :note_final,
                      status = :status
                  WHERE supportID = :ticket_id';
          try {
              $statement = $db->prepare($query);
              $statement->bindValue(':ticket_id', $ticket_id);
              $statement->bindValue(':note_final', $note_final);
              $statement->bindValue(':status', $status);
              $statement->execute();
              $statement->closeCursor();
          } catch (PDOException $e) {
              $error_message = $e->getMessage();
              display_db_error($error_message);
          }
        }









 ?>
