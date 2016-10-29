<?php $pageTitle = "Login";?>
<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <h1 class="page-header text-center">Login</h1>
            <form action="" method="post" class="form-horizontal">
                <input type="hidden" name="action" value="login" />

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">E-Mail:</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" placeholder="E-Mail" required class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="password">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" placeholder="Password" required class="form-control"/>
                    </div>
                </div>

                <div class="btn-group inline col-md-11">
                    <div class="col-md-3 col-md-offset-4 inline">
                        <input type="submit" value="Login" class="btn btn-success" />
                    </div>
                </form>

                <form action="" method="post" id="register_form">
                    <input type="hidden" name="action" value="view_register" />
                    <input type="submit"  value="Register" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
    <?php include '../view/footer.php'; ?>
