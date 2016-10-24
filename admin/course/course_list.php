<?php require_once('../../util/main.php');
 include 'view/header.php';
 include ('view/navbar_admin.php');
 require_once('model/course_db.php');

  	//echo	'<pre>';
  	//var_dump($_POST);
  	//echo'</pre>';
  ?>
 <div class="container">

     <div class="col-md-8 col-md-offset-1">
         <h1 class="page-header text-center">Course Manager</h1>
    </div>

<div class="form-group">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

        <h3>Course List</h3>
<form action="" method="post">
                <input type="hidden" name="action" value="course_view_add" />
                <input type="hidden" name="course_id" value=""/>
                <button type="submit" class="btn btn-success ">Add Course</button>
            </form>

        </div>
    </div>
    </div>

    <?php if ( count($courses) > 0 ) : ?>
<div class="col-md-8 col-md-offset-1">
        
          <table id="course_list" class="table table-striped table-hover" >
            <thead>
                <tr>
                  <th>Name</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>Course</th>
                  <th>Course</th>
                  <th>Holes</th>
                  <th>Holes</th>
                  <th>Holes</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Course</th>
                    <th>Course</th>
                    <th>Holes</th>
                    <th>Holes</th>
                    <th>Holes</th>
                </tr>
                </tfoot>
<?php foreach($courses as $course) : ?>
            <tbody>
                <tr>
                    <td><?php echo $course['courseName'];?></td>
                    <td><?php echo $course['city'];?></td>
                    <td><?php echo $course['province'];?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="course_view_edit">
                            <input type="hidden" name="course_id" value="<?php echo $course['courseID'];?>">
                            <input type="hidden" name="course_name" value="<?php echo $course['courseName'];?>">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post" >
                            <input type="hidden" name="action" value="course_view_delete_confirm">
                            <input type="hidden" name="course_id" value="<?php echo $course['courseID']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="holes_view_add">
                            <input type="hidden" name="course_id" value="<?php echo $course['courseID'];?>">
                            <button type="submit" class="btn btn-success btn-sm">Add</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="holes_view_edit">
                            <input type="hidden" name="course_id" value="<?php echo $course['courseID'];?>">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="holes_view_delete_confirm">
                            <input type="hidden" name="course_id" value="<?php echo $course['courseID'];?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>
</div>
<?php include 'view/footer.php'; ?>


  <script language='javascript'>
      $('#course_list').DataTable( {
          "autoWidth": true
      } );
      </script>
