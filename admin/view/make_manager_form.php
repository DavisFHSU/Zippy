<?php include './view/header.php'; ?>
<main>
    <h3>Add Make</h3>
    <form action="./index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_make">

        <label>Make</label>
        <input type="text" name="make_name" />
        <br>

        
        <input type="submit" value="Add Make" />
        <br>
    </form>

    <h3>Current Makes</h3>
    <div class="table-responsive"> 
    <table class="table"> 

    <thead>
        <tr>
                <th>Makes</th>
                <th>Inventory</th>
                <th>&nbsp;</th>
        </tr>
    </thread>

    <tbody>
        <?php foreach ( $makes as $make ) : ?>
            <tr>
                <td><?php echo $make['make']; ?></td>
                <td><?php echo count_make($make['ID']); ?>
                <td><form action="?action=delete_make" method="post">
                    <input type="hidden" name="make_id"
                           value="<?php echo $make['ID']; ?>">
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
