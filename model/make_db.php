<?php
function get_makes() {
    global $db;
    $query = 'SELECT * FROM make
              ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;    
}

function get_make_name($make_ID) {
    global $db;
    $query = 'SELECT * FROM make
              WHERE ID = :make_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_ID);
    $statement->execute();    
    $make = $statement->fetch();
    $statement->closeCursor();    
    $make_name = $make['make'];
    return $make_name;
}

function delete_make($make_ID) {
    global $db;
    $query = 'DELETE FROM make
              WHERE ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_ID);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_Name) {
    global $db;
    $query = 'INSERT INTO make
                 (make)
              VALUES
                 (:make_Name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_Name', $make_Name);
    $statement->execute();
    $statement->closeCursor();
}

function count_make($make_ID) {
    global $db;
    $query =    'SELECT COUNT(make_id)
                FROM vehicles
                WHERE make_id = :make_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_ID);
    $statement->execute();    
    $count1 = $statement->fetch();
    $statement->closeCursor();    
    return $count1[0];
}



?>

