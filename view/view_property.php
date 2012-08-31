<h1>Property Information</h1>
<h2><?php echo $property_name; ?></h2>
<p>Below are the answers for this property</p>
	<table>
		<thead>
			<th>Question</th>
			<th>Answer</th>
		<tbody>
	<?php foreach ($answers AS $answer) : ?>
			<tr>
				<td><?php echo $answer->getQuestionVerb(); ?></td>
				<td><?php echo $answer->getAnswerVerb(); ?></td>
			</tr>
	<?php endforeach; ?>
		</tbody>
	</table>
<a href="/home">home</a>