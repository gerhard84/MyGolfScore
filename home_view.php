<?php $pageTitle = "Home Page"; ?>
<?php include 'view/header.php'; ?>


<?php include 'view/navbar.php';?>

<div class="container-responsive">
     <div id="carousel" class="carousel slide" >
          <!-- Indicators -->
          <ol class="carousel-indicators">
               <li data-target="#carousel" data-slide-to="0" class="active"></li>
               <li data-target="#carousel" data-slide-to="1"></li>
               <li data-target="#carousel" data-slide-to="2"></li>
               <li data-target="#carousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" >
               <div class="item active">
                    <img src="<?php echo $app_path ?>images/1.jpg" alt="">
                    <div class="carousel-caption">
                         <h3>It's good sportsmanship to not pick up lost golf balls while they are still rolling - Mark Twain</h3>
                    </div>
               </div>

               <div class="item">
                    <img src="<?php echo $app_path ?>images/2.jpg" alt="">
                    <div class="carousel-caption">
                         <h3>This is a game of misses. The guy who misses the best is going to win - Ben Hogan</h3>
                    </div>
               </div>

               <div class="item">
                    <img src="<?php echo $app_path ?>images/3.jpg" alt="">
                    <div class="carousel-caption">
                         <h3>Forget your opponents, always play against par - Sam Snead</h3>
                    </div>
               </div>

               <div class="item">
                    <img src="<?php echo $app_path ?>images/4.jpg" alt="">
                    <div class="carousel-caption">
                         <h3>I play with friends, but we don't play friendly games - Ben Hogan</h3>
                    </div>
               </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
          </a>
     </div>
</div>

<!-- Script to Activate the Carousel -->
<script>
$('.carousel').carousel({
interval: 5000 //changes the speed
})
</script>


<?php include 'view/footer.php'; ?>
