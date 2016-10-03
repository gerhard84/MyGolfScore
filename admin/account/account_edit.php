<?php include '../../view/header.php'; ?>
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Edit Account</h1>
    <div class="well well-sm">
    <form action="" method="post" class="form-horizontal">
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />

        <div class="form-group">
            <label class="control-label col-sm-4" for="email">E-Mail:</label>
            <div class="col-sm-8">
                <input type="text" name="email" value="<?php echo $email; ?>" required class="form-control" />
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-4" for="first_name">First Name:</label>
            <div class="col-sm-8">
                <input type="text" name="first_name" value="<?php echo $first_name; ?>" required class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="last_name">Last Name:</label>
            <div class="col-sm-8">
                <input type="text" name="last_name" value="<?php echo $last_name; ?>" required class="form-control"/>
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-4" for="password_1">New Password:</label>
            <div class="col-sm-8">
                <input type="password" name="password_1" required class="form-control"/>
            </div>
        </div>

        Leave blank to leave unchanged
        <br />

        <div class="form-group">
            <label class="control-label col-sm-4" for="password_2">Retype Password:</label>
            <div class="col-sm-8">
                <input type="password" name="password_2" required class="form-control"/>
            </div>
        </div>

<div class="row">
        <input type="submit" value="Update" class="btn btn-success form-control"  />
        <span class="input-group-addon">-</span>
    </form>
    <form action="" method="post" >
        <input type="submit" value="Cancel" class="btn btn-danger form-control"/>
    </form>
    </div>
</div>
</div>
</div>
<?php include '../../view/footer.php'; ?>
