<?php include '../view/header.php'; ?>
<?php include '../view/navbar.php'; ?>

<div id="content">
    <h1 class="top">My Profile</h1>
    <p><?php echo $player_name . " (" . $email . ")" . " - Logins: ".$logins[0] ; ?></p>


    <form action="" method="post">
        <input type="hidden" name="action" value="view_profile_edit" />
        <input type="submit" value="Edit Profile" />
    </form>


    <!-- <?php if (count($rounds) > 0 ) : ?>
        <h2>Your Rounds</h2>
        <ul>
            <?php foreach($rounds as $round) :
                $round_id = $round['roundID'];
                $round_date = strtotime($round['roundDate']);
                $round_date = date('M j, Y', $round_date);
                $url = $app_path . 'account' .
                       '?action=view_round&round_id=' . $round_id;
                ?>
                <li>
                    round # <a href="<?php echo $url; ?>">
                    <?php echo $round_id; ?></a> placed on
                    <?php echo $round_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?> -->
</div>
<?php include '../view/footer.php'; ?>
