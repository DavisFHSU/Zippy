<?php
    $dsn = 'mysql:host=dfkpczjgmpvkugnb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=kbf909vbubz250w8';
    $username = 'inunyh1jgo4tmbbn';
    $password = 'g6tn59jb73aohzdq';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>