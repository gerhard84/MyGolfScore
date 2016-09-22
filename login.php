<?php
session_start();
include_once 'includes/dbconnect.php';

if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}
//check if form is submitted
if(isset($_POST['login'])){
		//email and password sent from Form
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['passwd']);
		$query = "SELECT * FROM players WHERE email = '" . $email. "' and password = '" . md5($password) . "'";
		$user = $db->query($query);

		if($user = $user->fetch(PDO::FETCH_ASSOC)){
		// # set session
		 $_SESSION['usr_id'] = $user['playerID'];
		 $_SESSION['usr_name'] = $user['name'];
		 // Increment logins
		 $query2 = "UPDATE players SET logins=logins+1 WHERE email = '" . $email. "'";
		 $logins = $db->query($query2);

		 header("Location: index.php");
		 }
		else {
		 	$errormsg = "Incorrect Email or Password!!!";
		 }
		 $db = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = "Login";?>
<?php include 'includes/head.php';?>
<?php include 'includes/navbar.php';?>

		<body>
			<div class="fluid-container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<h1 class="page-header text-center">Login</h1>
						<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
							<fieldset>

								<div class="form-group">
									<label for="name">Email</label>
									<input type="text" name="email" placeholder="Your Email" required class="form-control" />
								</div>

								<div class="form-group">
									<label for="name">Password</label>
									<input type="password" name="passwd" placeholder="Your Password" required class="form-control" />
								</div>

								<div class="form-group">
									<input type="submit" name="login" value="Login" class="btn btn-primary" />
								</div>
							</fieldset>
						</form>
						<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center">
					New User? <a href="register.php">Sign Up Here</a>
					</div>
				</div>
			</div>
<?php include 'includes/footer.php';?>
  </body>

</html>
