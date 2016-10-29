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



<div class="container">

   <div class="col-md-10 col-md-offset-1">

      <h1 class="page-header text-center">Scorecards</h1>

            <table id="aRounds" class="table table-striped table-hover" >
            <thead>
                <tr>
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
          $date = $round['playDate'];
          $player_id = $round['playerID'];
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
                         <input type="hidden" name="scorecardID" value="<?php echo $scorecard_id; ?>"/>
                         <input type="hidden" name="courseID" value="<?php echo $course_id ?>"/>
                         <input type="hidden" name="playerID" value="<?php echo $player_id ?>"/>
                         <input type="hidden" name="roundDate" value="<?php echo $date ?>"/>
                         <input type="hidden" name="holes" value="<?php echo $holes ?>"/>
                         <input type="hidden" name="handicap" value="<?php echo $handicap ?>"/>
                         <input type="hidden" name="course" value="<?php echo $course[1] ?>"/>
                         <button type="submit" class="btn btn-success btn-sm">View</button>
                      </form>
                    </td>
                </tr>
        <?php endforeach; ?>
        </table>
    </div>
    </div>



        <script language='javascript'>
        $('#aRounds').DataTable( {
            "autoWidth": true,
            "order": [[ 0, "desc" ]]
        } );
        </script>




 <?php include 'view/footer.php'; ?>
