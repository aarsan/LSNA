<?php include('./view/header.php'); ?>
<h1>Questionaire for 7009 N. Keeler, 60646</h1>
<h2>Click on the question to answer it.</h2>
    <table>
    	<thead>
    		<th>Completed?</th>
    		<th>Question</th>
    	</thead>
    	<tbody>
	<?php foreach ($questions AS $question) : ?>
	        <tr>
	        	<td>No</td>
	        	<td><a href="/properties/<?php echo $prop_id; ?>/question/<?php echo $question->getQId(); ?>"><?php echo $question->getQVerb(); ?></a></td>
	        </tr>
	<?php endforeach; ?>
    	</tbody>
    </table>
</br>
<a href="/home">home</a>
