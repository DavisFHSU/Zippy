<?php
require('./model/database.php');
require('./model/class_db.php');
require('./model/make_db.php');
require('./model/type_db.php');
require('./model/vehicle_db.php');



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    $class_id = filter_input(INPUT_GET, 'class_id', 
            FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_GET, 'make_id', 
            FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', 
            FILTER_VALIDATE_INT);
    $sort_by = filter_input(INPUT_GET, 'sort_by');

    if ($class_id == NULL || $class_id == FALSE) {
            $class_id = 0; }

    if ($make_id == NULL || $make_id == FALSE) {
            $make_id = 0; }

    if ($type_id == NULL || $type_id == FALSE) {
            $type_id = 0; }

    if ($sort_by == NULL) {
            $sort_by = 'price'; }

    $makes = get_makes();
    $classes = get_classes();
    $types = get_types();

    if ($make_id > 0) {
        $category_name = "Make";
        $vehicles = get_vehicles_by_make($make_id,$sort_by);
    }

    else if ($type_id > 0) {
        $category_name = "Type";
        $vehicles = get_vehicles_by_type($type_id,$sort_by);
    }

    else if ($class_id > 0) {
        $category_name = "Class";
        $vehicles = get_vehicles_by_class($class_id,$sort_by);
    }

    else {
        $category_name = "All Vehicles";
        $vehicles = get_all_vehicles($sort_by);
    }

    include('./view/list_all_vehicles.php');
}


?>
