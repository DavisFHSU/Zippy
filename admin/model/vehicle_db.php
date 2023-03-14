<?php
function get_vehicles_by_type($type_id,$sort_by) {
    global $db;

    if ($sort_by == 'price') {
        $query = 'SELECT vehicles.year, vehicles.model,
        vehicles.price, vehicles.inventory_num, type.type as category
        FROM vehicles, type
        WHERE vehicles.type_id = type.ID
        AND vehicles.type_id = :type_id
        ORDER BY vehicles.price DESC'; 
    }
        
    else if ($sort_by == 'year') {
        $query =     'SELECT vehicles.year, vehicles.model,
        vehicles.price, vehicles.inventory_num, type.type as category
        FROM vehicles, type
        WHERE vehicles.type_id = type.ID
        AND vehicles.type_id = :type_id
        ORDER BY vehicles.year DESC'; 
    }
    
    else {
    $query =    'SELECT vehicles.year, vehicles.model,
                vehicles.price, vehicles.inventory_num, type.type as category
                FROM vehicles, type
                WHERE vehicles.type_id = type.ID
                AND vehicles.type_id = :type_id
                ORDER BY vehicles.inventory_num'; 
    }
    $statement = $db->prepare($query);
    $statement->bindValue(":type_id", $type_id);
    $statement->execute();
    $items1 = $statement->fetchAll();
    $statement->closeCursor();
    return $items1;
}

function get_vehicles_by_make($make_id,$sort) {
    global $db;

    if ($sort == 'price') {
        $query =    'SELECT vehicles.year, vehicles.model,
                    vehicles.price, vehicles.inventory_num, make.make as category
                    FROM vehicles, make
                    WHERE vehicles.make_id = make.ID
                    AND vehicles.make_id = :make_id
                    ORDER BY vehicles.price';
        }

    else if ($sort == 'year') {
            $query =    'SELECT vehicles.year, vehicles.model,
                        vehicles.price, vehicles.inventory_num, make.make as category
                        FROM vehicles, make
                        WHERE vehicles.make_id = make.ID
                        AND vehicles.make_id = :make_id
                        ORDER BY vehicles.year';
            }

    else {
        $query =    'SELECT vehicles.year, vehicles.model,
                vehicles.price, vehicles.inventory_num, make.make as category
                FROM vehicles, make
                WHERE vehicles.make_id = make.ID
                AND vehicles.make_id = :make_id
                ORDER BY vehicles.inventory_num';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $items2 = $statement->fetchAll();
    $statement->closeCursor();
    return $items2;
}


function get_vehicles_by_class($class_id,$sort_by) {
    global $db;

    if ($sort_by == 'price') {
    $query =    'SELECT vehicles.year, vehicles.model,
                vehicles.price, vehicles.inventory_num, class.class as category
                FROM vehicles, class
                WHERE vehicles.class_id = class.ID
                AND vehicles.class_id = :class_id
                ORDER BY vehicles.price';
    }

    else if ($sort_by == 'year') {
        $query =    'SELECT vehicles.year, vehicles.model,
                    vehicles.price, vehicles.inventory_num, class.class as category
                    FROM vehicles, class
                    WHERE vehicles.class_id = class.ID
                    AND vehicles.class_id = :class_id
                    ORDER BY vehicles.year';
    }

    else {
            $query =    'SELECT vehicles.year, vehicles.model,
                        vehicles.price, vehicles.inventory_num, class.class as category
                        FROM vehicles, class
                        WHERE vehicles.class_id = class.ID
                        AND vehicles.class_id = :class_id
                        ORDER BY vehicles.inventory_num';
    }

    $statement = $db->prepare($query);
    $statement->bindValue(":class_id", $class_id);
    $statement->execute();
    $items3 = $statement->fetchAll();
    $statement->closeCursor();
    return $items3;
}

function get_all_vehicles($sort_by) {
    global $db;

    if ($sort_by == 'price') {
        $query = 'SELECT vehicles.year, vehicles.model,
        vehicles.price, vehicles.inventory_num, class.class, make.make, type.type 
        FROM vehicles, class, make, type
        WHERE vehicles.class_ID = class.ID and
        vehicles.make_id = make.ID and
        vehicles.type_id = type.ID
        ORDER BY vehicles.price DESC';
    }

    else if ($sort_by == 'year') {
        $query = 'SELECT vehicles.year, vehicles.model,
        vehicles.price, vehicles.inventory_num, class.class, make.make, type.type 
        FROM vehicles, class, make, type
        WHERE vehicles.class_ID = class.ID and
        vehicles.make_id = make.ID and
        vehicles.type_id = type.ID
        ORDER BY vehicles.year DESC';
    }

    else {
        $query = 'SELECT vehicles.year, vehicles.model,
        vehicles.price, vehicles.inventory_num, class.class, make.make, type.type 
        FROM vehicles, class, make, type
        WHERE vehicles.class_ID = class.ID and
        vehicles.make_id = make.ID and
        vehicles.type_id = type.ID
        ORDER BY vehicles.inventory_num';
    }


    $statement = $db->prepare($query);
    $statement->execute();
    $items4 = $statement->fetchAll();
    $statement->closeCursor();
    return $items4;
}

/* function get_all_vehicles($sort_by) {
    global $db;
    $query = 'SELECT vehicles.year, vehicles.model,
    vehicles.price, vehicles.inventory_num, class.class, make.make, type.type 
    FROM vehicles, class, make, type
    WHERE vehicles.class_ID = class.ID and
          vehicles.make_id = make.ID and
          vehicles.type_id = type.ID
    ORDER BY vehicles.:$sort_by';
    $statement = $db->prepare($query);
    $statement->bindValue(':sort_by', $sort_by);
    $statement->execute();
    $items4 = $statement->fetchAll();
    $statement->closeCursor();
    return $items4;
} */




function delete_vehicle($inventory_num) {
    global $db;
    $query = 'DELETE FROM vehicles
              WHERE inventory_num = :inventory_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':inventory_num', $inventory_num);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $class, $make, $type) {
    global $db;
    $query = 'INSERT INTO vehicles
                 (year, model, price,type_id,class_id,make_id)
              VALUES
                 (:year, :model, :price, :type, :class, :make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':class', $class);
    $statement->bindValue(':make', $make);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

?>
