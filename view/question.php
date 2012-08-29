<?php include('./view/header.php'); ?>
<h2>Please complete the question below.</h2>
<p><?php echo $question; ?></p>
<form method="post" action=".">
<select>
   <option name="answer_verb" value="option1"><?php echo $option1; ?></option>
   <option name="answer_verb" value="option2"><?php echo $option2; ?></option>
</select>
<input type="submit" value="Submit" />
</form>
<a href="/properties/modify/<?php echo $prop_id; ?>">back</a>