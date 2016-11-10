<?php
      // Check if user is logged in and
      // display appropriate account links
      $account_url = $app_path . 'account';
      $logout_url = $account_url . '?action=logout';
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo $app_path; ?>" class="navbar-left"> <img src="/images/logo-new.png"> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a class="active" href="<?php echo $app_path; ?>"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
					<?php if (isset($_SESSION['user'])) : ?>
            <li><a href="<?php echo $app_path ?>score"> <span class="glyphicon glyphicon-screenshot"></span> Submit Score</a></li>
						<?php else: ?>
							<li><a href="<?php echo $account_url ?>"> <span class="glyphicon glyphicon-remove-sign"></span> Submit Score</a></li>
							<?php endif; ?>
              <li><a href="<?php echo $app_path ?>rounds"><span class="glyphicon glyphicon-th-list"></span> Scorecards</a></li>
              <li><a href="<?php echo $app_path ?>faq.php"><span class="glyphicon glyphicon-globe"></span> FAQ</a></li>
              <li><a href="<?php echo $app_path ?>contact"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
                if (isset($_SESSION['user'])) :
                ?>
  				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['user']['firstName']; ?></p></li>
          <li><a href="<?php echo $account_url; ?>"> <span class="glyphicon glyphicon-user"></span> My Profile</a></li>
          <li><a href="<?php echo $logout_url; ?>"> <span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
        <?php else: ?>
          <li><a href="<?php echo $account_url; ?>"> <span class="glyphicon glyphicon-log-in"></span> Sign In / Register</a></li>
  				<?php endif; ?>
        </ul>
        </div>
  </div>
</nav>
