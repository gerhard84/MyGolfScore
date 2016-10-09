<?php
echo	'<pre>';
var_dump($_POST);
echo'</pre>';
?>

<?php
require_once('../util/main.php');
include 'view/header.php';
include ('view/navbar.php');
//require_once('model/course_db.php');
//require_once('model/hole_db.php');
//require_once('model/player_db.php');
?>

  <div class="container">

  	<div class="col-md-12 col-md-offset-1">
  		<h1 class="page-header text-center">Submit Score</h1>
      <h3 class="page-header text-left">Course: <?php echo $course?> </br>
                                        Date: <?php echo $date?> </br>
                                        Player: <?php echo $player?></h3>


  		<form action="" method="post" class="form-horizontal" >
        <input type="hidden" name="action" value="view_submit_data" />
  			<div class="col-md-12">
  				<div class="panel panel-primary">
  					<div class="panel-heading">Scorecard</div>
  					<div class="panel-body">

              <table class="table table-striped table-hover width: auto">
  							<thead>
  								<tr>
                    <th>Hole</th>
                    <?php for($i=1;$i<=9;$i++) { ?>
  									<th><?php echo $i;?></th>
                    <?php } ?>
                    <th>Gross</th>
                    <th>Net</th>
  								</tr>
  							</thead>
                <tbody>
  									<tr>
                      <th>Score</th>
                    <?php for($i=1;$i<=9;$i++) { ?>
  									<td><input class='form-control' type='number' name='hScore[]' id='hScore[]' value='' required value=''></td>
                    <?php } ?>
  									<td><input class='form-control' type='number' name='f9Gross' id='f9Gross' value='' required value=''></td>
                    <td><input class='form-control' type='number' name='f9Total' id='f9Total' value='' required value=''></td>
  									</tr>
  							</tbody>
  						</table>













              <?php if ($holes > 9) { ?>
              <table class="table table-striped table-hover width: auto">
  							<thead>
  								<tr>
                    <th>Hole</th>
                    <?php for($i=10;$i<=18;$i++) { ?>
  									<th><?php echo $i;?></th>
                    <?php } ?>
                    <th>Gross</th>
                    <th>Net</th>
  								</tr>
  							</thead>
                <tbody>
  									<tr>
                      <th>Score</th>
                    <?php for($i=1;$i<=9;$i++) { ?>
  									<td><input class='form-control' type='number' name='hScore[]' id='hScore[]' value='' required value=''></td>
                    <?php } ?>
  									<td><input class='form-control' type='number' name='b9Gross' id='b9Gross' value='' required value=''></td>
                    <td><input class='form-control' type='number' name='b9Total' id='b9Total' value='' required value=''></td>
  									</tr>
  							</tbody>
  						</table>
              <?php } ?>








            </div>
            </div>
            </div>

          </form>


            </div>
            </div>
