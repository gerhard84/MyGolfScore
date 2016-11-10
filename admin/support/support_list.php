<?php $pageTitle = "Admin-Support";?>
<?php
include ('view/header.php');
include ('view/navbar_admin.php');
?>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <h1 class="page-header text-center">Support Manager</h1>
  </div>

  <div class="col-md-8 col-md-offset-2">
    <?php if ( count($tickets) > 0 ) : ?>
      <table id="support_list" class="table table-striped table-hover" >
        <thead>
          <tr>
            <th>Date</th>
            <th>E-Mail</th>
            <th>User</th>
            <th>Subject</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Date</th>
            <th>E-Mail</th>
            <th>User</th>
            <th>Subject</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($tickets as $ticket) : ?>
            <tr>
              <td><?php echo $ticket['date'];?></td>
              <td><?php echo $ticket['email'];?></td>
              <td><?php echo $ticket['name'];?></td>
              <td><?php echo $ticket['subject'];?></td>
              <td><?php echo $ticket['status'];?></td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name="action" value="support_view_edit">
                  <input type="hidden" name="ticket_id" value="<?php echo $ticket['supportID'];?>">
                  <button type="submit" class="btn btn-success btn-sm">View</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else : ?>
      <p>Looks like everyone is happy!!!</p>
    <?php endif; ?>
  </div>
</div>

<?php
if (isset($_SESSION['form_data'])) {
  unset($_SESSION['form_data']);
}
?>

<script language='javascript'>
$(document).ready(function() {
  $('#support_list').DataTable();
} );
</script>

<?php include '../../view/footer.php'; ?>
