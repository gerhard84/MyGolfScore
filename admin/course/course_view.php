<?php $pageTitle = "Admin - Courses";?>
<?php include '../../view/header.php'; ?>
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Administrator Accounts</h1>

<?php if ( count($admins) > 1 ) : ?>
      <h2>Other Administrators</h2>
      <table id="courses" class="table table-striped table-bordered">
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

</div>
</div>
