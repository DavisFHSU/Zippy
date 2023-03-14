<main>
    <h4><strong>View Vehicles By:</strong>

    <form action="./index.php" method="get"
              id="add_product_form2">

        <label>Make:</label>
        <select name="make_id">
        <option value= 0>View All</option>
        <?php foreach ( $makes as $make ) : ?>
            <option value="<?php echo $make['ID']; ?>">
                <?php echo $make['make']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Type:</label>
        <select name="type_id">
        <option value= 0>View All</option>
        <?php foreach ( $types as $type ) : ?>
            <option value="<?php echo $type['ID']; ?>">
                <?php echo $type['type']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Class:</label>
        <select name="class_id">
        <option value= 0>View All</option>
        <?php foreach ( $classes as $class ) : ?>
            <option value="<?php echo $class['ID']; ?>">
                <?php echo $class['class']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

       <Strong>Sort by:</strong><br>
        <input type="radio" id="year" name="sort_by" value="year">
        <label for="year">Year</label><br>
        <input type="radio" id="price" name="sort_by" value="price">
        <label for="price">Price</label><br>
     
        <input type="submit" value="Submit">
    </h4>
            
</form>