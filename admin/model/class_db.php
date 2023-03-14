<?php
function get_classes() {
    global $db;
    $query = 'SELECT * FROM class
              ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;    
}

function get_class_name($class_ID) {
    global $db;
    $query = 'SELECT * FROM class
              WHERE ID = :class_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_ID);
    $statement->execute();    
    $class = $statement->fetch();
    $statement->closeCursor();    
    $class_name = $class['class'];
    return $class_name;
}

function delete_class($class_ID) {
    global $db;
    $query = 'DELETE FROM class
              WHERE ID = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_ID);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_Name) {
    global $db;
    $query = 'INSERT INTO class
                 (class)
              VALUES
                 (:class_Name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_Name', $class_Name);
    $statement->execute();
    $statement->closeCursor();
}


function count_class($class_ID) {
    global $db;
    $query =    'SELECT COUNT(class_id)
                FROM vehicles
                WHERE class_id = :class_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_ID);
    $statement->execute();    
    $count = $statement->fetch();
    $statement->closeCursor();    
    return $count[0];
}

?>

