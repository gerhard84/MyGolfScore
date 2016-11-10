<?php $pageTitle = "Home Page"; ?>
<?php require_once('util/main.php');?>
<?php include 'view/header.php'; ?>


<?php include 'view/navbar.php';?>

<div class="container">
  <div class="col-md-7 col-md-offset-2">

    <h1 class="page-header text-center">FAQ</h1>
    <p><strong>Note:</strong> Please read through this FAQ before requesting support.</p>
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">So, what is this site all about?</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">The idea beheind <strong>My Golf Score</strong> is to record your golf rounds and keep track of your handicap.</div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">How is my <strong>handicap</strong> calculated?</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>Background:</h4>
            <ul>
              <li>The formula used is the same that is used by the <a href="http://www.usga.org/content/usga/home-page/Handicapping/handicap-manual.html#!rule-14367"><strong>USGA.</strong></a></li>
              <li>On <strong>My Golf Score</strong> only 18 hole rounds are used for Handicap calculations. Depending popularity of the site and requests, 9 hole rounds may be added in the future.</li>
              <li>A minimum of <strong>five</strong> rounds is needed before the handicap is calculated.</li>
              <li>After the fith round has been entered, the first handicap will be calculated.</li>
              <li>The handicap will be recalculated after every round entered.</li>
            </ul>
            <h4>Step 1 - Calculate the Differentials:</h4>
            <strong>Formula: (Score - Course Rating) x 113 / Slope Rating</strong></br>
            For example, let's say your score is 85, the course rating 72.2, the slope 131. The formula would be:</br>
            <strong>(85 - 72.2) x 113 / 131 = 11.04</strong></br>
            The sum of that calculation is called your "handicap differential." This differential is calculated for each round entered (minimum of five, maximum of 20).
            (Note: The number 113 is a constant and represents the slope rating of a golf course of average difficulty.)

            <h4>Step 2: Determine How Many Differentials To Use:</h4>
            <p>Not every differential that results from Step 1 will be used in the next step. If only five rounds are entered, only the lowest of your five differentials will be used in the following step.
              If 20 rounds are entered, only the 10 lowest differentials are used. Use this chart to determine how many differentials to use in your handicap calculation.</p>

              <strong>Number of Differentials Used</strong></br>
              The number of rounds you are reporting for handicap purposes determines the number of differentials used in the USGA handicap calculation, as follows:

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Rounds Entered</th>
                    <th>Differentials Used</th>
                  </tr>
                  <tbody>
                    <tr>
                      <td>5-6 rounds</td>
                      <td>Use 1 lowest differential</td>
                    </tr>
                    <tr>
                      <td>7-8 rounds</td>
                      <td>Use 2 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>9-10 rounds</td>
                      <td>Use 3 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>11-12 rounds</td>
                      <td>Use 4 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>13-14 rounds</td>
                      <td>Use 5 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>15-16 rounds</td>
                      <td>Use 6 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>17 rounds</td>
                      <td>Use 7 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>18 rounds</td>
                      <td>Use 8 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>19 rounds</td>
                      <td>Use 9 lowest differentials</td>
                    </tr>
                    <tr>
                      <td>20 rounds</td>
                      <td>Use 10 lowest differentials</td>
                    </tr>
                  </tbody>
                </table>
                <h4>Step 3: Average Your Differentials:</h4>
                <p>Get an average of the differentials used by adding them together and dividing by the number used
                  (i.e., if five differentials are used, add them up and divide by five).</p>
                  <h4>Step 4: Arriving At Your Handicap Index:</h4>
                  <p>And the final step is to take the number that results from Step 3 and multiply the result by 0.96 (96-percent).
                    Drop all the digits after the tenths (do not round off) and the result is handicap index.</p>
                    <p>Let's give an example using five differentials. Our differentials worked out to (just making up some numbers for this example)
                      11.04, 12.33, 9.87, 14.66 and 10.59. So we add those up, which produces the number 58.49. Since we used five differentials,
                      we divide that number by five, which produces 11.698. And we multiple that number by 0.96, which equals 11.23, and 11.2 is our handicap index. </p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Who can use <strong>My Golf Score</strong> and who can enter rounds</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p><strong>My Golf Score</strong> is open for everyone to use so please invite your friends to join.</p>
                      <p>Only registred users may enter scores. Scores can be entered for yourself and for other players that is registred on the site</p>
                      <p>When a score is submitted to your account, an email will be sent with the details. If you receive a mail and did not play the round,
                        please contact <a href="http://www.http://mygolfscore.co.za/contact"><strong>Support</strong></a>. We will investigate and take appropriate action</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">The course I played is not listed when I want to submit a score</a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>The courses included in the original site design is very limited, but you can request a course to be added via the
                        <a href="http://www.http://mygolfscore.co.za/contact"><strong>Contact us.</strong></a> page. It is really </p>
                      <p>To add a new course, we need as much info as possible. Please include all the details in the request or mail it to <a href="mailto:support@mygolfscore.co.za" target="_top">support@mygolfscore.co.za</a></p>
                      <h4>Course details needed:</h4>
                      <ul>
                        <li>Course name.</li>
                        <li>Course location.</li>
                        <li>Course contact details.</li>
                        <li>Course stroke index.</li>
                        <li>Course slope.</li>
                        <li>Par for every hole.</li>
                        <li>Stroke Index for every hone.</li>
                        <li>Length of every hole.</li>
                      </ul>
                      <p>It is suggested to scan or take good quality picture of the scorecard and mail it to us. We will take care of the rest and nform you when you can try to add your score.</p>
                      <p>It is really easy to add a course and only takes a couple of minutes, so please don’t hesitate to request a new course to be added.
                         It will make the experience for everyone better. </p>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include 'view/footer.php'; ?>
