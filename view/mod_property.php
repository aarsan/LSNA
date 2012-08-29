<?php include('./view/header.php'); ?>
<h2>Please select the question you'd like to work on.</h2>
<?php foreach ($questions AS $question) : ?>
    <table>
    	<thead>
    		<th>Question</th>
    		<th>Completed?</th>
    	</thead>
    	<tbody>
	        <tr>
	        	<td><?php echo $question->getQVerb(); ?></td>
	        	<td>No</td>
	        </tr>
    	</tbody>
    </table>
<?php endforeach; ?>