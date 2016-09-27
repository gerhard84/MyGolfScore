<?php
$dsn = 'mysql:host=localhost;dbname=golfDB';
$username = 'golfDB';
$pass = 'DBmanager&1';

    try {
        $db = new PDO($dsn, $username, $pass);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
