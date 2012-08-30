<?php include('./view/header.php'); ?>
<h2>Modify your answer:</h2>
<p><?php echo $answer['q_verb']; ?></p>
<p>You answered: <?php echo $answer['answer_verb']; ?></p>
</br>
</br>
<h4>New Answer</h4>
<form method="post" action="/properties/<?php echo $prop_id; ?>/question/<?php echo $q_id; ?>">
<select name="answer_verb">
   <option value="<?php echo $option1; ?>"><?php echo $option1; ?></option>
   <option value="<?php echo $option2; ?>"><?php echo $option2; ?></option>
</select>
<input type="submit" value="Submit" />
</form>
<a href="/properties/modify/<?php echo $prop_id; ?>">back</a>