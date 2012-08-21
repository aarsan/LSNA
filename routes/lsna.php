<?php

$app->get('/', function () {
	header("Location: /login");
	break;

});

$app->get('/login', function () {
	include('./view/login.html');

});

$app->get('/lsna/new', function() {

});

$app->get('/lsna/address', function () {

	$nick_name = "Ahmet";

	ob_start();
    include('./lsna/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();

	include('./lsna/form.html');

});

$app->post('/lsna/address', function () {

	$key = "search :";
	$value = $_POST['street'];
	$value = "'$value'";
	$left = "{";
	$right = "}";

	$dataset = $left. " " .$key. " " .$value. " " .$right;

	ob_start();
    include('./lsna/query.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./lsna/lsna.html');

});

?>