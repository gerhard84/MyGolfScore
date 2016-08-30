<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = "Home Page";?>
<?php include 'includes/head.php';?>
<?php include 'includes/navbar.php';?>


  <body>
      <div class="container">
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
        <p>It's good sportsmanship to not pick up lost golf balls while they are still rolling - Mark Twain</p>
      </div>
    </div>

    <div class="item">
      <img src="./images/2.jpg" alt="Chania">
      <div class="carousel-caption">
        <p>This is a game of misses. The guy who misses the best is going to win - Ben Hogan</p>
      </div>
    </div>

    <div class="item">
      <img src="./images/3.jpg" alt="Flower">
      <div class="carousel-caption">
        <p>Forget your opponents, always play against par - Sam Snead</p>
      </div>
    </div>

    <div class="item">
      <img src="./images/4.jpg" alt="Flower">
      <div class="carousel-caption">
        <p>I play with friends, but we don't play friendly games - Ben Hogan</p>
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>
