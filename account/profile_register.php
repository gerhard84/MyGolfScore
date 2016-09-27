<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header text-center">Register</h1>
            <form  action="" method="post">
                <input type="hidden" name="action" value="register" />
                <fieldset>
					<div class="form-group">
					<label for="first_name">First Name:</label>
					<input type="text" name="first_name" placeholder="First Name"
                              required value="<?php echo $_SESSION['form_data']['first_name']; ?>" class="form-control"
                        />
					</div>

                    <div class="form-group">
						<label for="last_name">Last Name:</label>
						<input type="text" name="last_name" placeholder="Last Name"
                               required value="<?php echo $_SESSION['form_data']['last_name']; ?>" class="form-control"
                        />
					</div>

                    <div class="form-group">
						<label for="town">Town:</label>
						<input type="text" name="town" placeholder="Town"
                               required value="<?php echo $_SESSION['form_data']['town']; ?>" class="form-control"
                        />
					</div>

                    <div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" placeholder="Email Address"
                               required value="<?php echo $_SESSION['form_data']['email']; ?>" class="form-control"
                        />
					</div>

                    <div class="form-group">
						<label for="password_1">Password:</label>
						<input type="password" name="password_1" placeholder="Password"
                                class="form-control"
                        />
                        <span class="text-danger"><?php echo $password_message; ?></span>
					</div>

                    <div class="form-group">
						<label for="password_2">Retype Password:</label>
						<input type="password" name="password_2" placeholder="Retype Password"
                                class="form-control"
                        />
					</div>

                    <div class="form-group">
						<input type="submit" value="Register" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<?php include '../view/footer.php'; ?>
