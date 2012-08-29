<?php include('./view/header.php'); ?>
<h2>Please select the question you'd like to work on.</h2>
<?php foreach ($questions AS $question) : ?>
    <ul>
        <li><?php echo $question->getQVerb(); ?></li>
    </ul>
<?php endforeach; ?>