<?php include './view/header.php'; ?>
<main>
    <h3>Add New Class</h3>
    <form action="./index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_class">

        <label>New class</label>
        <input type="text" name="class_name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add class" />
        <br>
    </form>

    <h3>Current Classes</h3>
    <div class="table-responsive"> 
    <table class="table"> 

    <thead>
        <tr>
                <th>Classes</th>
                <th>Inventory</th>
                <th>&nbsp;</th>
        </tr>
    </thread>

    <tbody>
        <?php foreach ( $classes as $class) : ?>
            <tr>
                <td><?php echo $class['class']; ?></td>
                <td><?php echo count_class($class['ID']); ?>
                <td><form action="?action=delete_class" method="post">
                    <input type="hidden" name="class_id"
                           value="<?php echo $class['ID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>      
    </div>
   
    <?php include './view/admin_menu.php'; ?>
</main>
<?php include './view/footer.php'; ?>
