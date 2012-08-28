<?php include('./view/header.php'); ?>

<script LANGUAGE="JavaScript" SRC="/assets/scripts/jquery-1.8.0.min.js" ></script>
<html>
<h2>Welcome to LSNA</h2>
</br>
<a href="/properties/new">Enter a new property</a>
</br>
<a href="/properties/search">Update an existing Property</a>
</br>
<a href="/properties/list">list all properties</a>
</br>
</br>
</br>
<p>Your Property Queue</p>
<table>
	<tbody>
		<?php foreach ($properties as $property) : ?>
		<tr>
			<td><?php echo $property->getNumber(); ?></td>
			<td><?php echo $property->getStreet(); ?></td>
			<td><?php echo $property->getZip(); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

