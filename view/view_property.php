<h1>Property Information</h1>
<h2><?php echo $property_name; ?></h2>
<p>Below are the answers for this property</p>
<?php foreach ($answers AS $answer) : ?>
	<table>
		<tr>
			<td><?php echo $answer->getAnswerVerb(); ?></td>
		</tr>
	</table>
<?php endforeach; ?>
<a href="/home">home</a>