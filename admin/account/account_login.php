<?php $pageTitle = "Admin-Login";?>
<?php include '../../view/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1 class="page-header text-center">Admin Login</h1>
      <form action="" method="post" class="form-horizontal" id="login_form">
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
      </div>
    </div>
  </div>
</div>

<?php include '../../view/footer.php'; ?>
