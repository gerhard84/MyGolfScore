<?php
require 'database.php';
//Select all layers
$query = $db->prepare('SELECT * from players');
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
          <h1 class="page-header text-center">Players</h1>
          <table id="players" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Surname</th>
                          <th>Email</th>
                          <th>Town</th>
                          <th>Logins</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Town</th>
                        <th>Logins</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php while( $row = $query->fetch(PDO::FETCH_ASSOC) ) { ?>
                      <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['town']; ?></td>
                        <td><?php echo $row['logins']; ?></td>
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
