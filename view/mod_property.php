<?php include('./view/header.php'); ?>
<h2>Questionaire for 7009 N. Keeler, 60646</h2>
<p>Click on the question to answer it.</p>

	<?php foreach ($answered_questions AS $question) : ?>
	        <tr>
	        	<td><a href="/properties/<?php echo $prop_id; ?>/question/<?php echo $question->getQId(); ?>"><?php echo $question->getQVerb(); ?></a></td>
	        </tr>
	<?php endforeach; ?>

</br>
<a href="/home">home</a>
