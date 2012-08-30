<?php include('./view/header.php'); ?>
<h2>Questionaire for 7009 N. Keeler, 60646</h2>
<p>Click on the question to answer it.</p>
    <table>
    	<thead>
    		<th>Completed?</th>
    		<th>Question</th>
    	</thead>
    	<tbody>
	<?php foreach ($answered_questions AS $answered) : ?>
	        <tr>
	        	<td>No</td>
	        	<td><a href="/properties/<?php echo $prop_id; ?>/question/<?php echo $question->getQId(); ?>"><?php echo $question->getQVerb(); ?></a></td>
	        </tr>
	<?php endforeach; ?>
    	</tbody>
    </table>
</br>
<a href="/home">home</a>
