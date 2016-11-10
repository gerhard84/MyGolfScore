<?php
require_once('util/main.php');
//require_once('util/secure_conn.php');
require_once('model/player_db.php');
require_once('model/handicap_db.php');
require_once('model/round_db.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');

$player_id = 143;

//$rounds = get_rounds_by_player($player_id);
$rounds = get_all_rounds();

?>

<?php
   foreach($rounds as $round) :
   $date[] = $round['playDate'];
   $gross[] = ((int)$round['gross']);
   $net[] = (int)$round['net'];
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
            title: 'Your Latest Rounds',
            curveType: 'function',
            pointSize: 5,
            pointShape: { type: 'triangle', rotation: 180 },

            legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('pRounds_chart'));

          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="pRounds_chart" style="width: 900; height: 500px"></div>
    </body>
   </html>
