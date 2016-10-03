<?php $pageTitle = "Admin - Account";?>
<?php include '../../view/header.php'; ?>
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Administrator Accounts</h1>
    <?php if (isset($_SESSION['admin'])) : ?>
    <h2>My Account</h2>


    <form action="" method="post" class="form-inline">
        <div class="form-group">
            <label for="email"><?php echo $name . ' (' . $email . ')'; ?></label>
            <input type="hidden" name="action" value="view_edit" />
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
        </div>
    </form>
    <?php endif; ?>
    <?php if ( count($admins) > 1 ) : ?>
        <h2>Other Administrators</h2>
        <table id="admins" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Edit </th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>

            <tbody>
        <?php foreach($admins as $admin):
            if ( $admin['adminID'] != $admin_id ) :
                ?>
                <tr>
                    <td><?php echo $admin['lastName'];?></td>
                    <td><?php echo $admin['firstName'];?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="view_edit" />
                            <input type="hidden" name="admin_id" value="<?php echo $admin['adminID'];?>"/>
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post" >
                        <input type="hidden" name="action" value="view_delete_confirm" />
                        <input type="hidden" name="admin_id" value="<?php echo $admin['adminID']; ?>" />
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                    </form>
                </tr>

            <?php endif; ?>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <h2>Add Administrator</h2>
    <form action="" method="post" id="add_admin_user_form" class="form-horizontal">
        <input type="hidden" name="action" value="create" />

            <div class="form-group">
                <label class="control-label col-sm-4" for="email">E-Mail:</label>
                <div class="col-sm-8">
                    <input type="text" name="email" placeholder="Email address" required class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="first_name">First Name:</label>
                <div class="col-sm-8">
                <input type="text" name="first_name" placeholder="First Name" required class="form-control" />
            </div>
        </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="last_name">Last Name:</label>
                <div class="col-sm-8">
                <input type="text" name="last_name" placeholder="Last Name" required class="form-control" />
            </div>
        </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="password_1">Password:</label>
                <div class="col-sm-8">
                <input type="password" name="password_1" placeholder="Password" required class="form-control" />
                <?php //echo $password_message; ?>
            </div>
        </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="password_2">Retype password:</label>
                <div class="col-sm-8">
                <input type="password" name="password_2" placeholder="Retype Password" required class="form-control"/>
            </div>
        </div>
            <div class="form-group">
                <div class="col-sm-8">
            <input type="submit" value="Add Admin" class="btn btn-success"/>
        </div>
    </div>

    </form>
</div>
</div>
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<script language='javascript'>
$(document).ready(function() {
  $('#admins').DataTable();
} );
</script>

<?php include '../../view/footer.php'; ?>
