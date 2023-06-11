<?php
    $dsn = 'mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_995c6dc43fed76b';
    $username = 'b46689e8632f98';
    $password = '577c9156';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>
