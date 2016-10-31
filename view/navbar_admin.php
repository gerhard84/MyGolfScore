<?php
      $account_url = $app_path . 'admin/account';
      $logout_url = $account_url . '?action=logout';
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
      <a href="<?php echo $app_path . 'admin'; ?>" class="navbar-left"><img src="/images/logo-new.png"></a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if (isset($_SESSION['admin'])) :?>
                <li><a href="<?php echo $app_path; ?>admin">Admin Home</a></li>
                <li><a href="<?php echo $app_path; ?>admin/course">Course Manager</a></li>
                <li><a href="<?php echo $app_path; ?>admin/players">Player Manager</a></li>
                <li><a href="<?php echo $app_path; ?>admin/account">Admin Manager</a></li>
          <?php else: ?>
                  <li><a href="<?php echo $app_path; ?>">Home</a></li>
        <?php endif; ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['admin'])) :?>
  				<li><p class="navbar-text">Signed in as Admin -  <?php echo $_SESSION['admin']['firstName']; ?></p></li>
          <li><a href="<?php echo $logout_url; ?>"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
  				<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
