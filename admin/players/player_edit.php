<?php $pageTitle = "Admin-Players";?>
<?php include '../../view/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <h1 class="page-header text-center">Edit Player</h1>
            <form action="" method="post" class="form-horizontal">
                <input type="hidden" name="action" value="update_player" />
                <input type="hidden" name="player_id" value="<?php echo $player_id; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-4" for="first_name">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="first_name" required value="<?php echo $first_name; ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="last_name">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="last_name" required value="<?php echo $last_name; ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="town">Town:</label>
                    <div class="col-sm-8">
                        <input type="text" name="town" required value="<?php echo $town; ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">E-Mail:</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" required value="<?php echo $email; ?>" class="form-control"/>
                    </div>
                </div>

                <h1 class="page-header text-center">Change password</h1>
                <div class="form-group">
                    <label class="control-label col-sm-11 ">Leave blank if password should stay unchanged</label>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="password_1">New Password:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_1" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="password_2">Retype Password:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_2" class="form-control"/>
                    </div>
                </div>

                <div class="btn-group inline col-md-11">
                    <div class="col-md-3 col-md-offset-4 inline">
                        <input type="submit" value="Update" class="btn btn-success" />
                    </div>
                    <div class="col-md-2 inline">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="window.location='index.php'"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../../view/footer.php'; ?>
