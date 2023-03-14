<?php include './view/header.php'; ?>
<main>
    <h1>Add Vehicle</h1>
    <form action="./index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_vehicle">

        <label>Make:</label>
        <select name="make_id">
        <?php foreach ( $makes as $make ) : ?>
            <option value="<?php echo $make['ID']; ?>">
                <?php echo $make['make']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br> 
        <br> 

        <label>Class:</label>
        <select name="class_id">
        <?php foreach ( $classes as $class ) : ?>
            <option value="<?php echo $class['ID']; ?>">
                <?php echo $class['class']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br> 
        <br> 

        <label>Type:</label>
        <select name="type_id">
        <?php foreach ( $types as $type ) : ?>
            <option value="<?php echo $type['ID']; ?>">
                <?php echo $type['type']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br> 
        <br> 

        <label>Year:</label>
        <input type="text" name="year" />
        <br>

        <label>Model:</label>
        <input type="text" name="model" />
        <br>

        <label>Price:</label>
        <input type="text" name="price" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vehicle" />
        <br>
    </form>
    
    <?php include './view/admin_menu.php'; ?>
    

</main>
<?php include './view/footer.php'; ?>