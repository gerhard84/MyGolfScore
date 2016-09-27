<?php
// Get the document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

// Get the application path
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1];


echo "$doc_root </br>";
echo "$uri </br>";

echo '<pre>'; print_r($dirs); echo '</pre>';

echo "$app_path </br>";


echo $doc_root . $app_path;



 ?>
