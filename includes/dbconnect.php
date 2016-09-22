<?php
$dsn = 'mysql:host=localhost;dbname=golfDB';
$username = 'golfDB';
$pass = 'DBmanager&1';

try {
    $db = new PDO($dsn, $username, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
	catch(PDOException $e){
		$error_message = $e->getMessage();
    include('includes/db_error.php');
    exit();
	}
  ?>
