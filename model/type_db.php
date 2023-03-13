<?php
function get_types() {
    global $db;
    $query = 'SELECT * FROM type
              ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;    
}

function get_type_name($type_ID) {
    global $db;
    $query = 'SELECT * FROM type
              WHERE ID = :type_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_ID);
    $statement->execute();    
    $type = $statement->fetch();
    $statement->closeCursor();    
    $type_name = $type['type'];
    return $type_name;
}

function delete_type($type_ID) {
    global $db;
    $query = 'DELETE FROM type
              WHERE ID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_ID);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_Name) {
    global $db;
    $query = 'INSERT INTO type
                 (type)
              VALUES
                 (:type_Name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_Name', $type_Name);
    $statement->execute();
    $statement->closeCursor();
}

function count_type($type_ID) {
    global $db;
    $query =    'SELECT COUNT(type_id)
                FROM vehicles
                WHERE type_id = :type_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_ID);
    $statement->execute();    
    $count = $statement->fetch();
    $statement->closeCursor();    
    return $count[0];
}
?>

