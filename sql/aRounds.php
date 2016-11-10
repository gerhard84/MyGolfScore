<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');
 ?>
 <?php include 'view/header.php'; ?>
 <?php include 'view/navbar.php'; ?>


<?php

$aRounds = get_all_rounds();

//echo json_encode($aRounds);


?>
</br>
</br>
</br>



    <h2>All played rounds</h2>
            <table id="aRounds" class="table table-striped table-hover" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Player</th>
                    <th>Course </th>
                    <th>Holes</th>
                    <th>Gross</th>
                    <th>Net</th>
                    <th>Hcap</th>
                    <th>Round</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Player</th>
                    <th>Course </th>
                    <th>Holes</th>
                    <th>Gross</th>
                    <th>Net</th>
                    <th>Hcap</th>
                    <th>Round</th>
                </tr>
            </tfoot>

            <tbody>
        <?php
          foreach($aRounds as $round) :
          $round_id = $round['roundID'];
          $player_id = $round['playerID'];
          $date = $round['playDate'];
          $player = $round['firstName']." ".$round['lastName'];
          $course_id = $round['courseID'];
          $course = get_course($course_id);
          $holes = $round['holesPlayed'];
          $gross = $round['gross'];
          $net = $round['net'];
          $handicap = $round['handicap'];
          $scorecard_id = $round['scorecardID'];
        ?>
                <tr>
                    <td><?php echo $round_id;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $player;?></td>
                    <td><?php echo $course[1];?></td>
                    <td><?php echo $holes;?></td>
                    <td><?php echo $gross;?></td>
                    <td><?php echo $net;?></td>
                    <td><?php echo $handicap;?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="view_scorecard" />
                            <input type="hidden" name="round_id" value="<?php echo $scorecard_id;?>"/>
                            <button type="submit" class="btn btn-warning btn-sm">View</button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
        </table>


        <script language='javascript'>
          $('#pRounds').DataTable( {
              "autoWidth": true
          } );
        </script>
        <script language='javascript'>
        $('#aRounds').DataTable( {
            "autoWidth": true
        } );
        </script>


        <?php
        echo	'<pre>';
        var_dump($aRounds);
        echo'</pre>';
        ?>

 <?php include 'view/footer.php'; ?>
