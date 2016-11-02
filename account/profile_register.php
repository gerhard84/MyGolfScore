<?php require_once('../util/main.php'); ?>
<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header text-center">Register</h1>
            <form  action="" method="post" class="form-horizontal">
                <input type="hidden" name="action" value="register" />
                <fieldset>
                    <div class="form-group">
                        <label for="first_name" class="control-label col-md-4">First Name:</label>
                        <div class="col-md-8">
                        <input type="text" name="first_name" placeholder="First Name"
                        required value="" class="form-control"
                        />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="control-label col-md-4">Last Name:</label>
                        <div class="col-md-8">
                        <input type="text" name="last_name" placeholder="Last Name"
                        required value="" class="form-control"
                        />
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="town" class="control-label col-md-4">Town:</label>
                        <div class="col-md-8">
                        <input type="text" name="town" placeholder="Town"
                        required value="" class="form-control"
                        />
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label col-md-4">Email:</label>
                        <div class="col-md-8">
                        <input type="text" name="email" placeholder="Email Address"
                        required value="" class="form-control"
                        />
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="password_1" class="control-label col-md-4">Password:</label>
                        <div class="col-md-8">
                        <input type="password" name="password_1" placeholder="Minimum 6 characters"
                        class="form-control"
                        />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_2" class="control-label col-md-4">Retype Password:</label>
                        <div class="col-md-8">
                        <input type="password" name="password_2" placeholder="Retype Password"
                        class="form-control"
                        />
                    </div>
                    </div>

                    <div class="btn-group inline col-md-12">
            <div class="col-md-4 col-md-offset-2 inline">
                <input type="submit" value="Register" class="btn btn-success form-control" />
            </div>
            <div class="col-md-2  inline">
                <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="window.location='index.php'"/>
            </div>
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
