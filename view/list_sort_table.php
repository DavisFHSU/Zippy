    <thead>
        <tr>
                <th>Year</th>
                <th>Model</th>
                <th>Price</th>
                <th><?php echo $category_name;?></th>
				
        </tr>
    </thead>

    <tbody>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?php echo $vehicle['year']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td>$<?php echo $vehicle['price']; ?></td>
                <td><?php echo $vehicle['category']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
