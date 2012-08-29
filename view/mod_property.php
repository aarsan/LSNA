<?php include('./view/header.php'); ?>
<h2>Please select the question you'd like to work on.</h2>
    <table>
    	<thead>
    		<th>Question</th>
    		<th>Completed?</th>
    	</thead>
    	<tbody>
<?php foreach ($questions AS $question) : ?>
	        <tr>
	        	<td><?php echo $question->getQVerb(); ?></td>
	        	<td>No</td>
	        </tr>
<?php endforeach; ?>
    	</tbody>
    </table>
