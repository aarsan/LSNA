<h2>List of all properties:</h2>
    <table>
    	<thead>
    		<th>House Number</th>
    		<th>Full Street Name</th>
    		<th>Zip Code</th>
    		<th></th>
    	</thead>
    	<tbody>
        <?php foreach ($properties AS $property) : ?>
                <tr>
                	<td><?php echo $property->getNumber(); ?></td>
                    <td><?php echo $property->getStreet(); ?></td>
                    <td><?php echo $property->getZip(); ?></td>
                    <td><a class="btn" href="/properties/<?php echo $property->getPropId(); ?>/view">view</a>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>