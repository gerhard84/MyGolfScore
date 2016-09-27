<?php
session_start();
include_once 'database.php';
if(isset($_SESSION['is_valid_admin'])) {
	header("Location: index.php");
}

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = htmlspecialchars($_POST['name']);
	$surname = htmlspecialchars($_POST['surname']);
	$town = htmlspecialchars($_POST['town']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['passwd']);
	$cpassword = htmlspecialchars($_POST['cpassword']);

	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only letters";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
		$error = true;
		$surname_error = "Surname must contain only letters";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$town)) {
		$error = true;
		$town_error = "Town must contain only letters";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) try {

    // Set SQL
		$password = md5($password);
    $sql = "INSERT INTO players
							(name,surname,town,email,password)
						VALUES
							('$name', '$surname', '$town', '$email', '$password')";
		if ($db->query($sql)) {
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
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
<?php include 'head.php';?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Register";?>

<?php include 'navbar_Admin.php';?>


  <body>

<div class="fluid-container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="page-header text-center">Sign Up</h1>
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Surname</label>
						<input type="text" name="surname" placeholder="Enter Surname" required value="<?php if($error) echo $surname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($surname_error)) echo $surname_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Town</label>
						<input type="text" name="town" placeholder="Enter Town" required value="<?php if($error) echo $town; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($town_error)) echo $town_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="email" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="passwd" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
