<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">

      <a href="/index.php" class="navbar-left"><img src="/images/logo-new.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
            <li class="active"><a href="/index.php">Home</a></li>
					<?php if (isset($_SESSION['usr_id'])) { ?>
            <li><a href="/scoreAdd.php">Submit Score</a></li>
						<?php } else { ?>
							<li><a href="/login.php">Submit Score</a></li>
							<?php } ?>
            <li><a href="/players.php">Players</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="./dropdown" href="/courses.php">Courses <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/addCourse.php">Add</a></li>
                  <li><a href="/courses.php">Manage</a></li>
                </ul>
            </li>
            <li><a href="/model/contact.php">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
  				<?php if (isset($_SESSION['usr_id'])) { ?>
  				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
  				<li><a href="/logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
  				<?php } else { ?>
          <li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  				<li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  				<?php } ?>
        </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
