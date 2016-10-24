<?php $pageTitle = "Profile";?>
<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>



<div class="container">

    <div class="col-md-6 col-md-offset-3">

        <h1 class="page-header text-center">My Profile</h1>
<div class="panel panel-primary">
    <div class="panel-heading">Logins: <?php echo $logins[0];?></div>
<div class="panel-body">
    <form action="" method="post" class="form-horizontal">
        <?php echo $player_name . " (" . $email . ")"; ?>
        <input type="hidden" name="action" value="view_profile_edit" />
        <button type="submit" class="btn btn-warning btn-sm">Edit Profile</button>
    </form>
</div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Rounds Played: <?php echo $roundCount[0] ; ?></div>
<div class="panel-body">

     <?php if (count($rounds) > 0 ) : ?>
    <h2>Rounds</h2>
            <table id="pRounds" class="table table-striped table-hover" >
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Course </th>
                    <th>Holes</th>
                    <th>Gross</th>
                    <th>Net</th>
                    <th>Hcap</th>
                    <th>Round</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Course </th>
                    <th>Holes</th>
                    <th>Gross</th>
                    <th>Net</th>
                    <th>Hcap</th>
                    <th>Round</th>
                </tr>
            </tfoot>

            <tbody>
        <?php
          foreach($rounds as $round) :
          $date = $round['playDate'];
          $course_id = $round['courseID'];
          $course = get_course($course_id);
          $holes = $round['holesPlayed'];
          $gross = $round['gross'];
          $net = $round['net'];
          $handicap = $round['handicap'];
          $scorecard_id = $round['scorecardID'];
        ?>
                <tr>
                    <td><?php echo $date;?></td>
                    <td><?php echo $course[1];?></td>
                    <td><?php echo $holes;?></td>
                    <td><?php echo $gross;?></td>
                    <td><?php echo $net;?></td>
                    <td><?php echo $handicap;?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="view_scorecard" />
                            <input type="hidden" name="scorecard_id" value="<?php echo $scorecard_id;?>"/>
                            <button type="submit" class="btn btn-warning btn-sm">View</button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h2>My rounds</h2>
        <p>Go out and play some rounds!!!</p>

<?php endif; ?>
</div>
</div>
</div>
</div>


<?php include '../view/footer.php'; ?>
