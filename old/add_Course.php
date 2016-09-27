<?php
// session_start();
//
// if(isset($_SESSION['usr_id'])) {
// 	header("Location: index.php");
// }

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['addCourse'])) {
	$name = htmlspecialchars($_POST['name']);
	$city = htmlspecialchars($_POST['city']);
	$province = htmlspecialchars($_POST['province']);
	$tel = htmlspecialchars($_POST['tel']);
	$website = htmlspecialchars($_POST['website']);
	$email = htmlspecialchars($_POST['email']);
	$rating = htmlspecialchars($_POST['rating']);
	$slope = htmlspecialchars($_POST['slope']);
	$parOut = htmlspecialchars($_POST['parOut']);
	$parIn = htmlspecialchars($_POST['parIn']);
	$parTotal = htmlspecialchars($_POST['parTotal']);
	$mOut = htmlspecialchars($_POST['mOut']);
	$mIn = htmlspecialchars($_POST['mIn']);
	$mTotal = htmlspecialchars($_POST['mTotal']);

	// //name can contain only alpha characters and space
	// if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
	// 	$error = true;
	// 	$name_error = "Name must contain only letters";
	// }
	// if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
	// 	$error = true;
	// 	$surname_error = "Surname must contain only letters";
	// }
	// if (!preg_match("/^[a-zA-Z ]+$/",$town)) {
	// 	$error = true;
	// 	$town_error = "Town must contain only letters";
	// }
	// if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	// 	$error = true;
	// 	$email_error = "Please Enter Valid Email ID";
	// }






	//Process Form Submit
	if (!$error) try {
include_once 'database.php';
    // Set SQL
    $sql = "INSERT INTO courses
							(name,city,province,tel,website,email,rating,slope,parOut,parIn,parTotal,mOut,mIn,mTotal)
						VALUES('$name', '$city', '$province', '$tel', '$website', '$email', '$rating',
										'$slope', '$parOut', '$parIn', '$parTotal', '$mOut', '$mIn', '$mTotal')";
		if ($db->query($sql)) {
			$successmsg = "Successfully added Course! <a href='login.php'>Click here to Login</a>";
			echo "<script type= 'text/javascript'>alert('Successfully Registered!');</script>";
			header("Location: login.php");
		}
			else{
				$errormsg = "Error in registering...Please try again later!";
				echo "<script type= 'text/javascript'>alert('Error in registering...Please try again later!');</script>";
			}

			}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}
			}
?>

<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = "Add Course";?>
<?php include 'head.php';?>


  <body>
<?php include 'navbar.php';?>
<div class="fluid-container">
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<h1 class="page-header text-center">Add Course</h1>
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="addCourseForm">
					<div class="panel-group">
						<div class="panel panel-primary">
							<div class="panel-heading">Course Location</div>
								<div class="panel-body">
									<div class="col-xs-4">
										<label for="name">Name</label>
										<input type="text" name="name" placeholder="Course Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
										<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
									</div>

									<div class="col-xs-4">
										<label for="city">City</label>
										<input type="text" name="city" placeholder="City" required value="<?php if($error) echo $city; ?>" class="form-control" />
										<span class="text-danger"><?php if (isset($city_error)) echo $city_error; ?></span>
									</div>

									<div class="col-xs-4">
										<label for="province">Province</label>
										<input type="text" name="province" placeholder="Province" required value="<?php if($error) echo $province; ?>" class="form-control" />
										<span class="text-danger"><?php if (isset($province_error)) echo $province_error; ?></span>
									</div>
								</div>
							</div>

							<div class="panel panel-primary">
								<div class="panel-heading">Contact Details</div>
								<div class="panel-body">
										<div class="col-xs-4">
											<label for="tel">Contact number</label>
											<input type="tel" name="tel" placeholder="Contact Number" required value="<?php if($error) echo $tel; ?>" class="form-control" />
											<span class="text-danger"><?php if (isset($tel_error)) echo $tel_error; ?></span>
										</div>

										<div class="col-xs-4">
											<label for="website">Website</label>
											<input type="url" name="website" placeholder="Email" required value="<?php if($error) echo $website; ?>" class="form-control" />
											<span class="text-danger"><?php if (isset($website_error)) echo $website_error; ?></span>
										</div>

										<div class="col-xs-4">
											<label for="email">Email</label>
											<input type="email" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
											<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
										</div>
								</div>
							</div>

									<div class="panel panel-primary">
										<div class="panel-heading">Course Info</div>
											<div class="panel-body">
												<div class="col-xs-3">
													<label for="rating">Course Rating</label>
													<input type="number" name="rating" placeholder="Rating" required value="<?php if($error) echo $stroke; ?>" class="form-control" />
													<span class="text-danger"><?php if (isset($stroke_error)) echo $stroke_error; ?></span>
												</div>

												<div class="col-xs-2">
													<label for="parOut">Par Out</label>
													<input type="number" name="parOut" placeholder="Out" required value="<?php if($error) echo $parOut; ?>" class="form-control" />
													<span class="text-danger"><?php if (isset($parOut_error)) echo $parOut_error; ?></span>
												</div>

												<div class="col-xs-2">
													<label for="parIn">Par In</label>
													<input type="number" name="parIn" placeholder="In" required value="<?php if($error) echo $parIn; ?>" class="form-control" />
													<span class="text-danger"><?php if (isset($parIn_error)) echo $parIn_error; ?></span>
												</div>

												<div class="col-xs-2">
													<label for="parTotal">Par Total</label>
													<input type="number" name="parTotal" placeholder="Total" required value="<?php if($error) echo $parTotal; ?>" class="form-control" />
													<span class="text-danger"><?php if (isset($parTotal_error)) echo $parTotal_error; ?></span>
												</div>
											</div>

										<div class="panel-body">
											<div class="col-xs-3">
												<label for="slope">Course Slope</label>
												<input type="number" name="slope" placeholder="Slope" required value="<?php if($error) echo $slope; ?>" class="form-control" />
												<span class="text-danger"><?php if (isset($slope_error)) echo $slope_error; ?></span>
											</div>

											<div class="col-xs-2">
												<label for="mOut">Meters Out</label>
												<input type="number" name="mOut" placeholder="Meters" required value="<?php if($error) echo $mOut; ?>" class="form-control" />
												<span class="text-danger"><?php if (isset($mOut_error)) echo $mOut_error; ?></span>
											</div>

											<div class="col-xs-2">
												<label for="mIn">Meters In</label>
												<input type="number" name="mIn" placeholder="Meters" required value="<?php if($error) echo $mIn; ?>" class="form-control" />
												<span class="text-danger"><?php if (isset($mIn_error)) echo $mIn_error; ?></span>
											</div>

											<div class="col-xs-2">
												<label for="mTotal">Meters Total</label>
												<input type="number" name="mTotal" placeholder="Meters" required value="<?php if($error) echo $mTotal; ?>" class="form-control" />
												<span class="text-danger"><?php if (isset($mTotal_error)) echo $mTotal_error; ?></span>
											</div>
										</div>
										</div>
									</div>
								<div class="form-group">
									<input type="submit" name="addCourse" value="Add Course" class="btn btn-primary" />
								</div>
							</form>
						<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
						<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
					</div>
				</div>
			</div>
<?php include "footer.php";?>
