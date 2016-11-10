<?php $pageTitle = "Admin - Account";?>
<?php include '../../view/header.php'; ?>

<div class="container">
  <div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Delete Account</h1>
    <h3>Delete the account for:</h3>
    <p><?php echo $last_name . ', ' . $first_name .
    ' (' . $email . ')'; ?>?</p>
    <form action="" method="post">
      <input type="hidden" name="action" value="delete" />
      <input type="hidden" name="admin_id"
      value="<?php echo $admin_id; ?>" />
      <input type="submit" value="Delete Account" />
    </form>
    <form action="" method="post">
      <input type="submit" value="Cancel" />
    </form>
  </div>
</div>
<?php include '../../view/footer.php'; ?>
