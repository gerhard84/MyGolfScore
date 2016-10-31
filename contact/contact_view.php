<?php
$pageTitle = "Contact Us";
include 'view/header.php';
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <form role="form" class="form-horizontal" action="" method="post" name="contactform">
                <input type="hidden" name="action" value="process_contact" />
            <fieldset>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label">Name</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="name" placeholder="Full Name" type="text" value="" />
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email" class="control-label">E-Mail</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="email" placeholder="E-Mail" type="text" value="" />
                        <span class="text-danger"></span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12">
                        <label for="subject" class="control-label">Subject</label>
                    </div>
                    <div class="col-md-12">
                        <select name="subject" size="1" class="form-control">
                            <option value="Request to add a course">Request to add a course</option>
                            <option value="Score submission problem">Score submission problem</option>
                            <option value="Change password">Change password</option>
                            <option value="Profile problem">Profile problem</option>
                            <option value="Report a bug">Report a bug</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="message" class="control-label">Message</label>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="4" placeholder="Please provide a detailed request. It will enable us to assist you faster."></textarea>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
