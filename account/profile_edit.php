<?php $pageTitle = "Profile Edit";?>
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
                        <input type="text" name="email" required value="<?php echo $email; ?>" class="form-control"/>
                    </div>

                    <h3>Change Password</h3>

                    <div class="form-group">
                        <label for="password_1">New Password:</label>
                        <input type="password" name="password_1" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="password_2">Retype Password:</label>
                        <input type="password" name="password_2" class="form-control"/>
                    </div>

                    <div class="btn-group inline col-md-12">
                        <div class="col-md-4 col-md-offset-2 inline">
                            <input type="submit" value="Update" class="btn btn-success form-control" />
                        </div>
                        <div class="col-md-2  inline">
                            <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="window.location='index.php'"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php include '../view/footer.php'; ?>
