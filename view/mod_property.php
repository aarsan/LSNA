<?php include('./view/header.php'); ?>
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
	        	<td><?php echo $question->getQVerb(); ?></td>
	        </tr>
<?php endforeach; ?>
    	</tbody>
    </table>
<a href="/home">home</a>
