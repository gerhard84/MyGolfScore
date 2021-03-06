<?php $pageTitle = "Admin-Players";?>
<?php include '../../view/header.php'; ?>
<div class="container">

  <div class="col-md-12">
    <h1 class="page-header text-center">Manage Players</h1>
    <?php if (isset($_SESSION['admin'])) : ?>

      <table id="players" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Town</th>
            <th>Register</th>
            <th>Logins</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Access</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Town</th>
            <th>Register</th>
            <th>Logins</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Access</th>
          </tr>
        </tfoot>

        <tbody>
          <?php foreach($players as $player) :
            $firstName = $player['firstName'];
            $lastName = $player['lastName'];
            $email = $player['email'];
            $town = $player['town'];
            $regDate = date_create($player['regDate']);
            $logins = $player['logins'];
            ?>
            <tr>
              <td><?php echo $firstName;?></td>
              <td><?php echo $lastName;?></td>
              <td><?php echo $email;?></td>
              <td><?php echo $town;?></td>
              <td><?php echo date_format($regDate, 'd/m/Y');?></td>
              <td><?php echo $logins;?></td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name="action" value="view_edit" />
                  <input type="hidden" name="player_id" value="<?php echo $player['playerID'];?>"/>
                  <button type="submit" class="btn btn-success btn-sm">Edit</button>
                </form>
              </td>
              <td>
                <form action="" method="post" >
                  <input type="hidden" name="action" value="view_delete_confirm" />
                  <input type="hidden" name="player_id" value="<?php echo $player['playerID']; ?>" />
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
              <td>
                <form action="" method="post" >
                  <input type="hidden" name="action" value="ban_player" />
                  <input type="hidden" name="player_id" value="<?php echo $player['playerID']; ?>" />
                  <button type="submit" class="btn btn-warning btn-sm">Access</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
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
  $('#players').DataTable();
} );
</script>

<?php include '../../view/footer.php'; ?>
