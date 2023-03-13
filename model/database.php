<?php
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    $password = '1200';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>