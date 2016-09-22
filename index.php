<?php
session_start(); // starts the session
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include_once 'includes/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = "Home Page";?>
<?php include 'includes/head.php';?>
<?php include 'includes/navbar.php';?>


  <body>
      <div class="fluid-container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <!-- NEW COMMENT TO TEST GIT -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="./images/1.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3>It's good sportsmanship to not pick up lost golf balls while they are still rolling - Mark Twain</h3>
      </div>
    </div>

    <div class="item">
      <img src="./images/2.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3>This is a game of misses. The guy who misses the best is going to win - Ben Hogan</h3>
      </div>
    </div>

    <div class="item">
      <img src="./images/3.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>Forget your opponents, always play against par - Sam Snead</h3>
      </div>
    </div>

    <div class="item">
      <img src="./images/4.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>I play with friends, but we don't play friendly games - Ben Hogan</h3>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    </div> <!-- /container -->


    <?php include 'includes/footer.php';?>

  </body>

</html>
