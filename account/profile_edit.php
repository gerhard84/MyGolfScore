<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header text-center">Edit Profile</h1>
            <form  action="" method="post">
                <input type="hidden" name="action" value="update_account" />
                <fieldset>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" required value="<?php echo $first_name; ?>" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" required value="<?php echo $last_name; ?>" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="town">Town:</label>
                        <input type="text" name="town" required value="<?php echo $town; ?>" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control"/>
                    </div>
                    <h1 class="page-header text-center">Change password</h1>
                    <div class="form-group">
                        <label for="password_1">New Password:</label>
                        <input type="password" name="password_1" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="password_2">Retype Password:</label>
                        <input type="password" name="password_2" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Update Profile" class="btn btn-primary" />
                    </div>
            </form>

                <div class="form-group">
                    <form action="" method="post" class="aligned">
                        <input type="submit" value="Cancel" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include '../view/footer.php'; ?>
