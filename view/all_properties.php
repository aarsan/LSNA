<h2>List of all properties:</h2>
<div id="content">
  <div id="label">
  </div>
    <div id="invitations">
        <table id="table-1">
            <?php foreach ($properties AS $property) : ?>
                <tr>
                    <td><?php echo $property->getStreet(); ?></td>
                    <td><a class="btn" href="/invitations/<?php echo $property->getStreet(); ?>/accept">accept</a>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>