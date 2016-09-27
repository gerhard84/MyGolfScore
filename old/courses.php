<?php
require 'database.php';
//Select all layers
$query = $db->prepare('SELECT * from courses');
$query->execute();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Players";?>
<?php include 'head.php';?>
  <body>
  <?php include 'navbar.php';?>
    <div class="fluid-container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="page-header text-center">Courses</h1>
          <table id="players" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>City</th>
                          <th>Province</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Manage</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Manage</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php while( $row = $query->fetch(PDO::FETCH_ASSOC) ) { ?>
                      <tr>
                        <td><?php echo $row['courseID']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['province']; ?></td>
                        <td><a  href="courseEdit.php?course_edit=<?php echo ($row['courseID']);?>" title="Edit" ><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                        <td><a  href="courseDelete.php?course_del=<?php echo ($row['courseID']);?>" title="Delete" onclick="return confirm('Confirm Course Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</td>
                        <td><a  href="manHoles.php?holes_add=<?php echo ($row['courseID']);?>" title="Holes" ><span class="glyphicon glyphicon-edit"></span> Holes</a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>
        </div>
  		</div>
  	</div>
    <!--DataTables script-->
    <script language='javascript'>
    $(document).ready(function() {
        $('#players').DataTable();
    } );
    </script>
    <?php include 'footer.php';?>
