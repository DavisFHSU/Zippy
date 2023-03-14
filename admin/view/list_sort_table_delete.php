    <thead>
        <tr>
                <th>Year</th>
                <th>Model</th>
                <th>Price</th>
                <th><?php echo $category_name;?></th>
                <th>&nbsp;</th>
        </tr>
    </thread>

    <tbody>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?php echo $vehicle['year']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td>$<?php echo $vehicle['price']; ?></td>
                <td><?php echo $vehicle['category']; ?></td>
                <td><form action="?action=delete_vehicle" method="post">
                    <input type="hidden" name="inventory_num"
                           value="<?php echo $vehicle['inventory_num']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
