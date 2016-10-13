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
<!--// load jQuery Plug-ins //-->
<script type="text/javascript" src="../assets/jQuery-2.2.3/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../assets/jquery.field.js"></script>
<script type="text/javascript" src="../assets/jquery.calculation.js"></script>
<script type="text/javascript">
$(document).ready(
function (){

  // bind the F9netCal Function to f9gross change
  $("input[name^=f9Gross]").bind("keyup", F9netCal);
  // run the calculation function now
  F9netCal();

  // bind the B9netCal Function to b9gross change
  $("input[name^=b9Gross]").bind("keyup", B9netCal);
  // run the calculation function now
  B9netCal();

  // bind the totalCal Function to net change
  $("input[name^=f9Gross]").bind("keyup", totalCal);
  $("input[name^=b9Gross]").bind("keyup", totalCal);
  // run the calculation function now
  totalCal();

  // automatically update the Front 9 Gross
  $("input[name^=f9hScore]").sum("keyup", "#f9Gross");
  // automatically update the Back 9 Gross
  $("input[name^=b9hScore]").sum("keyup", "#b9Gross");
  ////////////////////////////////////////////////////////
}

);

function F9netCal(){
  $("input[name^=f9Total]").calc(
    "f9Gross - hcap",
    {
  		hcap: $("input[name^=hcap]"),
  		f9Gross: $("input[name^=f9Gross]")
  	},
    function ($this){
  		$("input[name^=f9Total]").text(
        $this
      );
    }
  );
}

function B9netCal(){
  $("input[name^=b9Total]").calc(
    "b9Gross - hcap",
    {
  		hcap: $("input[name^=hcap]"),
  		b9Gross: $("input[name^=b9Gross]")
  	},
    function ($this){
  		$("input[name^=b9Total]").text(
        $this
      );
    }
  );
}

function totalCal(){
  $("input[name^=total]").calc(
    "f9Total + b9Total",
    {
  		f9Total: $("input[name^=f9Total]"),
  		b9Total: $("input[name^=b9Total]")
  	},
    function ($this){
  		$("input[name^=total]").text(
        $this
      );
    }
  );
}

</script>
  <div class="container">
  	<div class="col-md-12 col-md-offset-1">
  		<h1 class="page-header text-center">Submit Score</h1>
      <h3>Course: <?php echo $course?> </h3>
      <h3>Date: <?php echo $date?> </h3>
      <h3>Player: <?php echo $player?></h3>

      <input size="2" type='text' name='hcap' id='hcap' value='<?php echo $handicap[0]?>' readonly="readonly"></td>
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
                    <th>Par</th>
                  <?php foreach ($front9 as $f9) { ?>
                    <th><?php echo $f9['par'];?></th>
                  <?php } ?>
                  </tr>
                  <tr>
                    <th>Stroke</th>
                  <?php foreach ($front9 as $f9) { ?>
                    <th><?php echo $f9['stroke'];?></th>
                  <?php } ?>
                  </tr>
  									<tr>
                      <th>Score</th>
                    <?php for($i=1;$i<=9;$i++) { ?>
  									<td><input class='form-control' type='text' name='f9hScore[]' id='f9hScore[]' value='' required value=''></td>
                    <?php } ?>
  									<td><input class='form-control' type='text' name='f9Gross' id='f9Gross' value='0' required readonly="readonly"></td>
                    <td><input class='form-control' type='text' name='f9Total' id='f9Total' value='0' required readonly="readonly"></td>
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
                    <th>Par</th>
                  <?php foreach ($back9 as $b9) { ?>
                    <th><?php echo $b9['par'];?></th>
                  <?php } ?>
                  </tr>
                  <tr>
                    <th>Stroke</th>
                  <?php foreach ($back9 as $b9) { ?>
                    <th><?php echo $b9['stroke'];?></th>
                  <?php } ?>
                  </tr>
  									<tr>
                      <th>Score</th>
                    <?php for($i=1;$i<=9;$i++) { ?>
  									<td><input class='form-control' type='text' name='b9hScore[]' id='b9hScore[]' value='' required value=''></td>
                    <?php } ?>
  									<td><input class='form-control' type='text' name='b9Gross' id='b9Gross' value='0' required readonly="readonly"></td>
                    <td><input class='form-control' type='text' name='b9Total' id='b9Total' value='0' required readonly="readonly"></td>
  									</tr>
  							</tbody>
  						</table>
              <?php } ?>

              <input class='form-control' type='text' name='total' id='total' value='0' required readonly="readonly">










            </div>
            </div>
            </div>

          </form>


            </div>
            </div>
