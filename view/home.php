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
		<th>Questions Remaining</th>
	</thead>
	<tbody>
		<?php foreach ($properties as $property) : ?>
		<tr>
			<td><a href="/properties/modify/<?php echo $property->getPropId(); ?>"><?php echo $property->getNumber(); ?></a></td>
			<td><a href="/properties/modify/<?php echo $property->getPropId(); ?>"><?php echo $property->getStreet(); ?></a></td>
			<td><a href="/properties/modify/<?php echo $property->getPropId(); ?>"><?php echo $property->getZip(); ?></a></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $property->getAnswerCount(); ?>/<?php echo $q_count; ?></td>
			<td><a href="/properties/modify/<?php echo $property->getPropId(); ?>">Finish</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

