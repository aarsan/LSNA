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
	<thead>
		<th>Number</th>
		<th>Full Street Name</th>
		<th>Zip</th>
		<th>Progress</th>
	</thead>
	<tbody>
		<?php foreach ($properties as $property) : ?>
		<tr>
			<td><a href="#"><?php echo $property->getNumber(); ?></a></td>
			<td><a href="#"><?php echo $property->getStreet(); ?></a></td>
			<td><a href="#"><?php echo $property->getZip(); ?></a></td>
			<td><strong>0/20</strong></td>
			<td><a href="#">continue</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

