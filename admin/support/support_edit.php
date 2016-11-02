<?php
$pageTitle = "Admin - Support";
include 'view/header.php';
include 'view/navbar_admin.php';
 ?>

<div class="container">

        <div class="col-md-9 col-md-offset-1">
          <h1 class="page-header text-center col-md-offset-2">Status: <?php echo $status ?></h1>

          <div class="row col-md-offset-2">
            <h4 class="col-md-6 " for="course_name">Name: <?php echo $name ?></h4>
            <h4 class="col-md-6" for="play_date">E-Mail: <?php echo $email ?></h4>
            <h4 class="col-md-6" for="player_name">Date: <?php echo $date ?></h4>
            <h4 class="col-md-6" for="player_name">Subject: <?php echo $subject ?></h4>
          </div>
            <form role="form" class="form-horizontal" action="" method="post" name="message">
                <div class="form-group">
                        <label for="message" class="control-label col-md-2">Message:</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="message" rows="3" maxlength="254" readonly><?php echo $msg ?></textarea>
                    </div>
                </div>
            </form>
            <form role="form" class="form-horizontal" action="" method="post" name="note1">
                <input type="hidden" name="action" value="add_note" />
                <input type="hidden" name="ticket_id" value="<?php echo $ticket_id ?>" />
                <div class="form-group">
                        <input name="note1" type="submit" class="btn btn-success col-md-2" value="Add Note 1" />
                    <div class="col-md-9">
                        <textarea class="form-control" name="note1" rows="3" maxlength="254" ><?php echo $note_1 ?></textarea>
                    </div>
                </div>
            </form>
            <form role="form" class="form-horizontal" action="" method="post" name="note2">
                <input type="hidden" name="action" value="add_note" />
                <input type="hidden" name="ticket_id" value="<?php echo $ticket_id ?>" />
                <div class="form-group">
                        <input name="note2" type="submit" class="btn btn-success col-md-2" value="Add Note 2" />
                    <div class="col-md-9">
                        <textarea class="form-control" name="note2" rows="3" maxlength="254" ><?php echo $note_2 ?></textarea>
                    </div>
                </div>
            </form>
            <form role="form" class="form-horizontal" action="" method="post" name="note3">
                <input type="hidden" name="action" value="add_note" />
                <input type="hidden" name="ticket_id" value="<?php echo $ticket_id ?>" />
                <div class="form-group">
                        <input name="note3" type="submit" class="btn btn-success col-md-2" value="Add Note 3" />
                    <div class="col-md-9">
                        <textarea class="form-control" name="note3" rows="3" maxlength="254" ><?php echo $note_3 ?></textarea>
                    </div>
                </div>
            </form>
            <form role="form" class="form-horizontal" action="" method="post" name="noteFinal">
                <input type="hidden" name="action" value="add_note" />
                <input type="hidden" name="ticket_id" value="<?php echo $ticket_id ?>" />
                <div class="form-group">
                        <input name="noteFinal" type="submit" class="btn btn-success col-md-2" value="Resolve" />
                    <div class="col-md-9">
                        <textarea class="form-control" name="noteFinal" rows="3" maxlength="254" ><?php echo $note_final ?></textarea>
                    </div>
                </div>
            </form>

        </div>
    </div>

<?php include 'view/footer.php'; ?>
