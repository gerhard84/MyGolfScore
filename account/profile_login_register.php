<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header text-center">Login</h1>
    <form action="" method="post" id="login_form">
        <input type="hidden" name="action" value="login" />

        <fieldset>
            <div class="form-group">
                <label for="name">E-Mail</label>
                <input type="text" name="email" placeholder="Email address" required class="form-control" />
            </div>

            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" placeholder="Password" required class="form-control" />
            </div>


        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary" />
        </div>
    </fieldset>
    </form>


    <form action="" method="post" id="register_form">
        <input type="hidden" name="action" value="view_register" />
        <input type="submit"  value="Register" class="btn btn-primary" />
    </form>
    <label>&nbsp;</label>
</div>
</div>
</div>
<?php include '../view/footer.php'; ?>
