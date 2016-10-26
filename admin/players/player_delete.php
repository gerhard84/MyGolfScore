<?php $pageTitle = "Admin - Players";?>
<?php include '../../view/header.php'; ?>
<div class="container">

    <div class="col-md-5 col-md-offset-3">
        <h1 class="page-header text-center">Delete Player</h1>
        <p><?php echo $last_name . ', ' . $first_name .
        ' (' . $email . ')'; ?> ? </p>
        <form action="" method="post">
            <input type="hidden" name="action" value="delete_player" />
            <input type="hidden" name="player_id" value="<?php echo $player_id; ?>" />

            <div class="btn-group inline col-md-12">
                <div class="col-md-3 col-md-offset-2 inline">
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
