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

      <a href="<?php echo $app_path; ?>" class="navbar-left"><img src="/images/logo-new.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo $app_path; ?>">Home</a></li>
					<?php if (isset($_SESSION['user'])) : ?>
            <li><a href="scoreAdd.php">Submit Score</a></li>
						<?php else: ?>
							<li><a href="<?php echo $account_url; ?>">Submit Score</a></li>
							<?php endif; ?>
            <li><a href="players.php">Players</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="model/contact.php">Contact</a></li>
            <li>
            <!-- These links are for testing only.
                 Remove them from a production application. -->
            <a href="<?php echo $app_path; ?>admin">Admin</a>
          </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
                if (isset($_SESSION['user'])) :
                ?>
  				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['user']['firstName']; ?></p></li>
          <li><a href="<?php echo $account_url; ?>"><span class="glyphicon glyphicon-user"></span>My Profile</a></li>
          <li><a href="<?php echo $logout_url; ?>"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
        <?php else: ?>
          <li><a href="<?php echo $account_url; ?>"><span class="glyphicon glyphicon-user"></span>Register</a></li>
          <li><a href="<?php echo $account_url; ?>"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
  				<?php endif; ?>
        </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
