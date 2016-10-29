<?php require_once('../util/main.php'); ?>
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
                        required value="" class="form-control"

                        />
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" placeholder="Last Name"
                        required value="" class="form-control"
                        />
                    </div>

                    <div class="form-group">
                        <label for="town">Town:</label>
                        <input type="text" name="town" placeholder="Town"
                        required value="" class="form-control"
                        />
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Email Address"
                        required value="" class="form-control"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password_1">Password:</label>
                        <input type="password" name="password_1" placeholder="Minimum 6 characters"
                        class="form-control"
                        />

                    </div>

                    <div class="form-group">
                        <label for="password_2">Retype Password:</label>
                        <input type="password" name="password_2" placeholder="Retype Password"
                        class="form-control"
                        />
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
