<?php require_once('../util/main.php'); ?>
<?php include '../view/header.php'; ?>

<div class="container">
  <div class="col-md-6 col-md-offset-3">
    <h1 class="page-header text-center">Database Error</h1>
    <p>An error occurred connecting to the database.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <p>&nbsp;</p>
  </div>
</div>

<?php include '../view/footer.php'; ?>
