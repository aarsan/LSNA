<h2>List of all properties:</h2>
<div id="content">
  <div id="label">
  </div>
    <div id="invitations">
        <table id="table-1">
            <?php foreach ($properties AS $property) : ?>
                <tr>
                	<td><?php echo $property->getNumber(); ?></td>
                    <td><?php echo $property->getStreet(); ?></td>
                    <td><?php echo $property->getZip(); ?></td>
                    <td><a class="btn" href="/properties/<?php echo $property->getPropId(); ?>/view">view</a>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>