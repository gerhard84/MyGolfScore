<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');

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
            title: 'Your Last 10 Rounds',
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
      <div id="pRounds_chart" style="width: 900px; height: 500px"></div>
   </body>
   </html>
