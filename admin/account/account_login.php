<?php include '../../view/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header text-center">Admin Login</h1>
                <form action="" method="post" id="login_form">
                    <input type="hidden" name="action" value="login" />
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" name="email" placeholder="Email address" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary" />
                    </div>
                </form>
        </div>
    </div>
</div>

<?php include '../../view/footer.php'; ?>
