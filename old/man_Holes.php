<?php
// session_start();
//
// if(isset($_SESSION['usr_id'])) {
// 	header("Location: index.php");
// }
//
// //set validation error flag as false
$error = false;
$courseID = '2';

//check if form is submitted

if (isset($_POST['addHoles'])) {

	foreach ($_POST as $key => $value)
	{
		${$key} = htmlspecialchars($value);
	}

	// if empty($key) {
	// 	$error = true;
	// 	$submitError = "Please fill in all fields";
	// }
// 	echo	'<pre>';
// 	var_dump($_POST);
// 	echo'</pre>';
//
// echo	'<pre>';
// var_dump(array_keys(get_defined_vars()));
// echo'</pre>';

	//Process Form Submit
if (!$error) try {
include_once 'database.php';
    // Set SQL
    $sql = "INSERT INTO holes
							(courseID,holeNo,par,stroke,meters)
						VALUES
						('$courseID', '1', '$h1_par', '$h1_si', '$h1_meter'),
					 	('$courseID', '2', '$h2_par', '$h2_si', '$h2_meter'),
						('$courseID', '3', '$h3_par', '$h3_si', '$h3_meter'),
 						('$courseID', '4', '$h4_par', '$h4_si', '$h4_meter'),
 						('$courseID', '5', '$h5_par', '$h5_si', '$h5_meter'),
 						('$courseID', '6', '$h6_par', '$h6_si', '$h6_meter'),
 						('$courseID', '7', '$h7_par', '$h7_si', '$h7_meter'),
 						('$courseID', '8', '$h8_par', '$h8_si', '$h8_meter'),
 						('$courseID', '9', '$h9_par', '$h9_si', '$h9_meter'),
 						('$courseID', '10', '$h10_par', '$h10_si', '$h10_meter'),
 						('$courseID', '11', '$h11_par', '$h11_si', '$h11_meter'),
 						('$courseID', '12', '$h12_par', '$h12_si', '$h12_meter'),
 						('$courseID', '13', '$h13_par', '$h13_si', '$h13_meter'),
 						('$courseID', '14', '$h14_par', '$h14_si', '$h14_meter'),
 						('$courseID', '15', '$h15_par', '$h15_si', '$h15_meter'),
 						('$courseID', '16', '$h16_par', '$h16_si', '$h16_meter'),
 						('$courseID', '17', '$h17_par', '$h17_si', '$h17_meter'),
 						('$courseID', '18', '$h18_par', '$h18_si', '$h18_meter')";
		if ($db->query($sql)) {
			//$successmsg = "Successfully added Rounds!";
			//echo "<script type= 'text/javascript'>alert('Successfully Added Rounds!');</script>";
			header("Location: courses.php");
		}
		else{
			$errormsg = "Error in processing...Please try again!";
			echo "<script type= 'text/javascript'>alert('Error in processing...Please try again!');</script>";
		}

		}
				catch(PDOException $e)
				{
					echo $e->getMessage();
					include('database_error.php');
					exit();
				}
			}

?>

<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = "Add Holes";?>
<?php include 'view/header.php';?>


<body>
<?php include 'view/navbar.php';?>
<div class="fluid-container">

		<div class="col-md-8 col-md-offset-2">
			<h1 class="page-header text-center">Add Holes</h1>

<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="addHolesForm">
					<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading">Front 9</div>
									<div class="panel-body">
									<style>
										table { table-layout: fixed; }
										table th, table td { overflow: hidden; }
									</style>
										<div class="table-responsive">
										        <table id="productSizes" class="table" >
														<thead>
										            <tr>
																	<th style="width: 10%">Hole</th>
																	<th style="width: 20%">Meters</th>
																	<th style="width: 20%">Par</th>
																	<th style="width: 20%">SI</th>
										            </tr>
										        </thead>
										        <tfoot>
										            <tr>
																	<th style="width: 10%">Hole</th>
																	<th style="width: 20%">Meters</th>
																	<th style="width: 20%">Par</th>
																	<th style="width: 20%">SI</th>
										            </tr>
										        </tfoot>
										        <tbody>
															<?php
															for($i=1;$i<=9;$i++)
															{
																echo "<tr>";
																echo "<td>$i</td>";
																echo "<td><input type='number' id='h$i.meter' name='h$i.meter' value='' required value=''></td>";
																echo "<td><input type='number' id='h$i.par' name='h$i.par' value='' required value=''></td>";
																echo "<td><input type='number' id='h$i.si' name='h$i.si' value='' required value=''></td>";
										            echo "</tr>";
															}
																?>
															</tbody>
														</table>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
													<div class="panel panel-primary">
														<div class="panel-heading">Back 9</div>
															<div class="panel-body">
															<style>
																table { table-layout: fixed; }
																table th, table td { overflow: hidden; }
															</style>
																<div class="table-responsive">
																        <table id="productSizes" class="table" >
																				<thead>
																            <tr>
																							<th style="width: 10%">Hole</th>
																							<th style="width: 20%">Meters</th>
																							<th style="width: 20%">Par</th>
																							<th style="width: 20%">SI</th>
																            </tr>
																        </thead>
																        <tfoot>
																            <tr>
																							<th style="width: 10%">Hole</th>
																							<th style="width: 20%">Meters</th>
																							<th style="width: 20%">Par</th>
																							<th style="width: 20%">SI</th>
																            </tr>
																        </tfoot>
																        <tbody>
																					<?php
																					for($i=10;$i<=18;$i++)
																					{
																						echo "<tr>";
																						echo "<td>$i</td>";
																						echo "<td><input type='number' id='h$i.meter' name='h$i.meter' value='' required value=''></td>";
																						echo "<td><input type='number' id='h$i.par' name='h$i.par' value='' required value=''></td>";
																						echo "<td><input type='number' id='h$i.si' name='h$i.si' value='' required value=''></td>";
																            echo "</tr>";
																					}
																						?>
																					</tbody>
																				</table>
																				</div>
																			</div>
																		</div>
																	</div>

												<div class="form-group">
													<input type="submit" name="addHoles" value="Add Holes" class="btn btn-primary" />
												</div>
												<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
										</form>
									</div>
								</div>
						<?php //include "view/footer.php";?>
