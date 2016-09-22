<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-left"><img src="./images/logo-new.png"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

    <ul class="nav navbar-nav">
					<?php if (isset($_SESSION['usr_id'])) { ?>
            <li><a href="score-submit.php">Submit Score</a></li>
						<?php } else { ?>
							<li><a href="login.php">Submit Score</a></li>
							<?php } ?>
            <li><a href="players.php">Players</a></li>
						<li><a href="courses.php">Courses</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
  				<?php if (isset($_SESSION['usr_id'])) { ?>
  				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
  				<li><a href="logout.php">Log Out</a></li>
  				<?php } else { ?>
  				<li><a href="login.php">Login</a></li>
  				<li><a href="register.php">Register</a></li>
  				<?php } ?>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
