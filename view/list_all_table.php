    <thead>
        <tr>
                <th>Year</th>
                <th>Model</th>
                <th>Price</th>
                <th>Type</th>
                <th>Class</th>
                <th>Make</th>
                <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
			
                <td><?php echo $vehicle['year']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td>$<?php echo $vehicle['price']; ?></td>
                <td><?php echo $vehicle['type']; ?></td>
                <td><?php echo $vehicle['class']; ?></td>
                <td><?php echo $vehicle['make']; ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
