<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');
include 'view/header.php';
include 'view/navbar.php';

$player_id = 143;

$rounds = get_rounds_by_player($player_id);

?>

<?php
foreach($rounds as $round) :
   $date[] = $round['playDate'];
   $gross[] = ((int)$round['gross']);
   $handicap[] = (int)$round['handicap'];
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
         <?php for ($i=0; $i < count($date); $i++) { ?>
            ['<?php echo $date[$i]; ?>',  <?php echo $gross[$i]; ?>,       <?php echo $handicap[$i]; ?>],
            <?php } ?>

         ]);

         var options = {
            //title: 'Your Last 10 Rounds',
            curveType: 'function',
            pointSize: 10,
            pointShape: { type: 'triangle', rotation: 180 },

            legend: { position: 'bottom' }
         };

         var chart = new google.visualization.LineChart(document.getElementById('pRounds_chart'));

         chart.draw(data, options);
      }
      </script>
   </head>
   <body>
      <div class="container">

          <div class="col-md-6 col-md-offset-3">

              <h1 class="page-header text-center">My Profile</h1>
      <div class="panel panel-primary">
          <div class="panel-heading">Your Last 10 Rounds</div>
      <div class="panel-body" id="pRounds_chart">

      </div>
      </div>
      </div>
      </div>
   </body>
   </html>
