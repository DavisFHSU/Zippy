<?php include './view/header.php'; ?>
<main>
    <h1>Add Type</h1>
    <form action="./index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_type">

        <label>New Type</label>
        <input type="text" name="type_name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Type" />
        <br>
    </form>

    <h3>Current Types</h3>
    <div class="table-responsive"> 
    <table class="table"> 

    <thead>
        <tr>
                <th>Types</th>
                <th>Inventory</th>
                <th>&nbsp;</th>
        </tr>
    </thread>

    <tbody>
        <?php foreach ( $types as $type ) : ?>
            <tr>
                <td><?php echo $type['type']; ?></td>
                <td><?php echo count_type($type['ID']); ?>
                <td><form action="?action=delete_type" method="post">
                    <input type="hidden" name="type_id"
                           value="<?php echo $type['ID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>      
    </div>

    <br>
    <?php include './view/admin_menu.php'; ?>

</main>
<?php include './view/footer.php'; ?>
