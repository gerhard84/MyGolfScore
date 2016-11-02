<?php
$pageTitle = "Contact Us";
include 'view/header.php';
include 'view/navbar.php';
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h1 class="page-header text-center">Contact Us</h1>
            <form role="form" class="form-horizontal" action="" method="post" name="contactform">
                <input type="hidden" name="action" value="process_contact" />
            <fieldset>

                <div class="form-group">
                        <label for="name" class="control-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input class="form-control" name="name" placeholder="Full Name" type="text" value="" />
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3" for="email">E-Mail:</label>
                    <div class="col-md-9">
                        <input class="form-control" name="email" placeholder="E-Mail" type="text" value="" />
                    </div>
                </div>


                <div class="form-group">
                        <label for="subject" class="control-label col-md-3">Subject:</label>
                    <div class="col-md-9">
                        <select name="subject" size="1" class="form-control">
                            <option value="Score submission problem">Score submission problem</option>
                            <option value="Profile problem">Profile problem</option>
                            <option value="Change password">Change password</option>
                            <option value="Handicap problem">Handicap problem</option>
                            <option value="Request to add a course">Request to add a course</option>
                            <option value="Change password">Change password</option>                            
                            <option value="Report a bug">Report a bug</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                        <label for="message" class="control-label col-md-3">Message:</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="message" rows="8" maxlength="254" placeholder="Please provide a detailed mesage. This will enable us to assist you faster."></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-3 inline">
                        <input name="submit" type="submit" class="btn btn-success" value="Submit" />
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include '../view/footer.php'; ?>
