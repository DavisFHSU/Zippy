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
            $sort_by = 'inventory_num'; }

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

else if ($action == 'delete_vehicle') {
    $inventory_num = filter_input(INPUT_POST, 'inventory_num', 
            FILTER_VALIDATE_INT);
            
    if ($inventory_num == NULL || $inventory_num == FALSE) {
        $error = "Missing or incorrect inventory number.";
        include('./errors/error.php');
    } else { 
        delete_vehicle($inventory_num);
        header("Location: .?action=list_items");
    }
}

else if ($action == 'show_vehicle_add_form') {
    $makes = get_makes();
    $classes = get_classes();
    $types = get_types();
    include('./view/vehicle_manager_form.php');
}

else if ($action == 'add_vehicle') {
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
    $class = filter_input(INPUT_POST, 'class_id');
    $make = filter_input(INPUT_POST, 'make_id');
    $type = filter_input(INPUT_POST, 'type_id');
    $model = filter_input(INPUT_POST, 'model');
    if ($year == NULL || $year == false || $price == NULL || $price == false
        || $class == NULL || $class == false || $make == NULL || $make == false
        || $type == NULL || $type == false || $model == NULL) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php'); } 
     else {
    add_vehicle($year, $model, $price, $class, $make, $type);
    header("Location: .?action=list_items");} 
}

else if ($action == 'show_make_add_form') {
    $makes = get_makes();
    include('./view/make_manager_form.php'); 
}

else if ($action == 'add_make') {
    $make_name = filter_input(INPUT_POST, 'make_name');
    if ($make_name == NULL) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php'); }
    else {
    add_make($make_name);
    $makes = get_makes();
    include('./view/make_manager_form.php'); 
    // header("Location: .?action=list_items");
    }
}

else if ($action == 'delete_make') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if ($make_id == NULL || $make_id == false) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php'); }
    else {
        try {
            delete_make($make_id);
            $makes = get_makes();
            include('./view/make_manager_form.php'); 
            
        } catch (Exception $e) {
            $error = $e->getMessage();
            include('./errors/error.php');
            exit();
        }
    }
 
}

else if ($action == 'show_type_add_form') {
    $types = get_types();
    include('./view/type_manager_form.php'); 
}

else if ($action == 'add_type') {
    $type_name = filter_input(INPUT_POST, 'type_name');
    if ($type_name == NULL) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php'); }
    else {
        add_type($type_name);
        $types = get_types();
        include('./view/type_manager_form.php'); 
    }
}

else if ($action == 'delete_type') {
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    if ($type_id == NULL || $type_id == false) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php'); }
    else {
        try {
            delete_type($type_id);
            $types = get_types();
            include('./view/type_manager_form.php');
        } catch (Exception $e) {
            $error = $e->getMessage();
            include('./errors/error.php');
            exit();
        }
    }
} 

else if ($action == 'show_class_add_form') {
    $classes = get_classes();
    include('./view/class_manager_form.php'); 
}

else if ($action == 'add_class') {
    $class_name = filter_input(INPUT_POST, 'class_name');

    if ($class_name == NULL) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php');
    } else { 
    add_class($class_name);
    $classes = get_classes();
    include('./view/class_manager_form.php');
    }
}

else if ($action == 'delete_class') {
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if ($class_id == NULL || $class_id == false) {
        $error = "Invalid data. Check all fields and try again.";
        include('./errors/error.php');
    } 
    else {
        try {
            delete_class($class_id);
            $classes = get_classes();
            include('./view/class_manager_form.php');
        } catch (Exception $e) {
            $error = $e->getMessage();
            include('./errors/error.php');
            exit();
        }
    }
} 
?>