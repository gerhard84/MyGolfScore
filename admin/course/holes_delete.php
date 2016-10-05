<?php $pageTitle = "Admin - Courses";?>
<?php include '../../view/header.php'; ?>
<?php include ('../../view/navbar_admin.php');?>
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Delete Holes for <?php echo $courseName ?></h1>
    <form action="" method="post">
        <input type="hidden" name="action" value="holes_delete" />
        <input type="hidden" name="course_id"
               value="<?php echo $course_id; ?>" />
        <input type="submit" value="Delete Holes" />
    </form>
    <form action="" method="post">
        <input type="submit" value="Cancel" />
    </form>
</div>
</div>
<?php include '../../view/footer.php'; ?>
