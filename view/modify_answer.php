<?php include('./view/header.php'); ?>
<h2>Modify your answer:</h2>
<p><?php echo $answer['q_verb']; ?></p>
<p>You answered: <?php echo $answer['answer_verb']; ?></p>
<a href="/properties/modify/<?php echo $prop_id; ?>">back</a>