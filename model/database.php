<?php
   // $dsn = 'mysql:host=dfkpczjgmpvkugnb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=kbf909vbubz250w8';
   // $username = 'inunyh1jgo4tmbbn';
   // $password = 'g6tn59jb73aohzdq';

    $dsn = 'mysql:host=577c9156@us-cdbr-east-06.cleardb.net/heroku_995c6dc43fed76b';
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
