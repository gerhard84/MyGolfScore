<?php
$dsn = 'mysql:host=localhost;dbname=golfDB';
$username = 'golfDB';
$pass = 'DBmanager&1';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $pass, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
?>
