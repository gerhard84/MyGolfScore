<?php include '../../view/header.php'; ?>
<div id="content">
    <h1>Admin Login</h1>
    <form action="" method="post">
        <input type="hidden" name="action" value="login" />
        <label for="email">E-Mail:</label>
        <input type="text" name="email" />
        <br />
        <label for="password">Password:</label>
        <input type="password" name="password" />
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Login" />
    </form>
</div>
<?php include '../../view/footer.php'; ?>
