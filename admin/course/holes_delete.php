<?php $pageTitle = "Admin - Courses";?>
<?php include '../../view/header.php'; ?>
<?php include ('../../view/navbar_admin.php');?>
<div class="container">
  <div class="col-md-4 col-md-offset-4">
    <h1 class="page-header text-center">Delete All Holes for: </br> <?php echo $courseName ?> ?</h1>
    <form action="" method="post">
      <input type="hidden" name="action" value="holes_delete" />
      <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
      <div class="btn-group inline col-md-12">
        <div class="col-md-4 col-md-offset-2 inline">
          <input type="submit" value="Delete" class="btn btn-success form-control" />
        </div>
        <div class="col-md-2  inline">
          <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="window.location='index.php'"/>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include '../../view/footer.php'; ?>
