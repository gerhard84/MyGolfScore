<?php $pageTitle = "Round View";?>
<?php
require_once('../util/main.php');
include 'view/header.php';
include 'view/navbar.php';

?>
<div class="container">
  <h1 class="page-header text-center ">View Scorecard</h1>

  <div class="row col-md-offset-3">
    <h4 class="col-md-5 " for="course_name">Course: <?php echo $course ?></h4>
    <h4 class="col-md-5" for="play_date">Date: <?php echo $date ?></h4>
    <h4 class="col-md-5" for="player_name">Player: <?php echo $player_name ?></h4>
    <h4 class="col-md-5" for="play_date">Handicap: <?php echo $handicap ?></h4>
    <h4 class="col-md-5" for="gross">Gross: <?php echo $gross ?></h4>
    <h4 class="col-md-5" for="net" >Net: <?php echo $net ?></h4>
  </div>

  <div class="row text-center col-md-offset-3">
    <form action="" method="post" class="form-horizontal">
      <input type="hidden" name="action" value="submit_score"/>
      <input type="hidden" name="courseID" value="<?php echo $_POST['courseID']?>"/>
      <input type="hidden" name="playerID" value="<?php echo $_POST['playerID']?>"/>
      <input type="hidden" name="roundDate" value="<?php echo $_POST['roundDate']?>"/>
      <input type="hidden" name="holes" value="<?php echo $_POST['holes']?>"/>
      <input type="hidden" name="handicap" value="<?php echo $handicap ?>"/>

      <div class="col-md-8">
        <div class="panel panel-primary">
          <div class="panel-heading">Scorecard</div>
          <div class="panel-body">

            <table class="table table-striped table-hover width: auto">
              <thead>
                <tr>
                  <th>Hole</th>
                  <?php for($i=1;$i<=9;$i++) { ?>
                    <th><?php echo $i;?></th>
                    <input type="hidden" name='holeNo[]' id='holeNo[]' value='<?php echo $i; ?>'/>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Par</th>
                    <?php foreach ($front9 as $f9) { ?>
                      <td><?php echo $f9['par'];?></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <th>Stroke</th>
                      <?php foreach ($front9 as $f9) { ?>
                        <td><?php echo $f9['stroke'];?></td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <th>Score</th>
                        <?php foreach ($f9Scores as $f9Score) { ?>
                          <th><?php echo $f9Score['score'];?></th>
                          <?php } ?>
                        </tr>
                      </tbody>
                    </table>

                    <?php if ($holes > 9) { ?>
                      <table class="table table-striped table-hover width: auto">
                        <thead>
                          <tr>
                            <th>Hole</th>
                            <?php for($i=10;$i<=18;$i++) { ?>
                              <th><?php echo $i;?></th>
                              <input type="hidden" name='holeNo[]' id='holeNo[]' value='<?php echo $i; ?>'/>
                              <?php } ?>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Par</th>
                              <?php foreach ($back9 as $b9) { ?>
                                <td><?php echo $b9['par'];?></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <th>Stroke</th>
                                <?php foreach ($back9 as $b9) { ?>
                                  <td><?php echo $b9['stroke'];?></td>
                                  <?php } ?>
                                </tr>
                                <tr>
                                  <th>Score</th>
                                  <?php foreach ($b9Scores as $b9Score) { ?>
                                    <th><?php echo $b9Score['score'];?></th>
                                    <?php } ?>
                                  </tr>
                                </tbody>
                              </table>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row col-md-10 col-md-offset-5" >
                            <input type="button" name="cancel" value="Cancel" class="btn btn-danger col-md-2" onClick="window.location='index.php'"/>
                          </div>
                        </br>
                      </div>
                    </form>
                  </div>
                </div>
