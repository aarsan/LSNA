<h2>Property Information</h2>
<?php echo $property_name; ?>
<?php foreach ($answers AS $answer) : ?>
	<table>
		<tr>
			<td><?php echo $answer->getAnswerVerb(); ?></td>
		</tr>
	</table>
<?php endforeach; ?>