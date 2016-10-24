<?php $pageTitle = "Admin - Courses";?>
<?php include '../../view/header.php'; ?>
<?php include ('../../view/navbar_admin.php');?>
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Delete Course</h1>
    <h3>Delete the course :</h3>
       <p><?php echo $name . ', ' . $city .
                  ' (' . $province . ')'; ?>?</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="course_delete" />
        <input type="hidden" name="course_id"
               value="<?php echo $course_id; ?>" />
        <input type="submit" value="Delete Course" />
    </form>
    <form action="" method="post">
        <input type="submit" value="Cancel" />
    </form>
</div>
</div>
<?php include '../../view/footer.php'; ?>
