<?php
    // make sure the page uses a secure connection
    if (!isset($_SERVER['HTTP'])) {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: " . $url);
        exit();
    }
?>
