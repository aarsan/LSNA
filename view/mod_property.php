<?php include('./view/header.php'); ?>
<h1>Questionaire for 7009 N. Keeler, 60646</h1>
<p>-------------------------------------------------------------------------------------------------------------</p>
<h2>Unanswered Questions:</h2>
<p><?php echo $message; ?></p>
    <table>
    <?php foreach ($unanswered_questions AS $question) : ?>
            <tr>
                <td><a href="/properties/<?php echo $prop_id; ?>/question/<?php echo $question->getQId(); ?>"><?php echo $question->getQVerb(); ?></a></td>
            </tr>
    <?php endforeach; ?>
    </table>
<h2>Questions already answered</h2>
<p>Click on the question to modify your answer:</p>
    <table>
	<?php foreach ($answered_questions AS $question) : ?>
	        <tr>
	        	<td><a href="/properties/<?php echo $prop_id; ?>/question/<?php echo $question->getQId(); ?>"><?php echo $question->getQVerb(); ?></a></td>
	        </tr>
	<?php endforeach; ?>
    </table>
</br>
<a href="/home">home</a>
