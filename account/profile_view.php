<?php $pageTitle = "Profile";?>
<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>
<?php

foreach($gRounds as $gRound) :
   $gDate[] = $gRound['playDate'];
   $gGross[] = ((int)$gRound['gross']);
   $gHandicap[] = (int)$gRound['handicap'];
endforeach;
?>

<html>
<head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
      var data = google.visualization.arrayToDataTable([
         ['Date', 'Gross', 'Handicap'],
         <?php for ($i=0; $i < count($gDate); $i++) { ?>
            ['<?php echo $gDate[$i]; ?>',  <?php echo $gGross[$i]; ?>,       <?php echo $gHandicap[$i]; ?>],
            <?php } ?>

         ]);

         var options = {
            //title: 'Your Last 10 Rounds',
            curveType: 'function',
            pointSize: 10,
            pointShape: { type: 'triangle', rotation: 90 },

            legend: { position: 'bottom' }
         };

         var chart = new google.visualization.LineChart(document.getElementById('pRounds_chart'));

         chart.draw(data, options);
      }
      </script>
   </head>

   <div class="container">

      <div class="col-md-10 col-md-offset-1">

         <h1 class="page-header text-center">Handicap: <?php echo $lHandicap[0];?></h1>

         <div class="panel panel-primary">
            <div class="panel-heading">Logins: <?php echo $logins[0];?></div>
            <div class="panel-body">
               <form action="" method="post" class="form-horizontal text-center">
                  <?php echo $player_name . " (" . $email . ")" . "&nbsp". "&nbsp". "&nbsp"; ?>
                  <input type="hidden" name="action" value="view_profile_edit" />
                  <button type="submit" class="btn btn-warning btn-sm">Edit Profile</button>
               </form>
            </div>
         </div>

         <div class="panel panel-primary">
            <div class="panel-heading">Latest Rounds</div>
            <div class="panel-body" id="pRounds_chart">
            </div>
         </div>

         <div class="panel panel-primary">
            <div class="panel-heading">All Rounds:</div>
            <div class="panel-body">

               <?php if (count($rounds) > 0 ) : ?>
                  <table id="pRounds" class="table table-striped table-hover" >
                     <thead>
                        <tr>
                           <th>Date</th>
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
                        foreach($rounds as $round) :
                           $date = $round['playDate'];
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
                  <?php else : ?>
                     <h2>My rounds</h2>
                     <p>Go out and play some rounds!!!</p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      <script language='javascript'>
      $(document).ready(function() {
         $('#pRounds').DataTable( {
             "autoWidth": true,
             "order": [[ 0, "desc" ]]
         } );

      } );
      </script>


      <?php include '../view/footer.php'; ?>
