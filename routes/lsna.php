<?php

//this redirects from root to login page
$app->get('/', function () {
    header("Location: /login");
    break;

});

//login page
$app->get('/login', function () {
    include('./view/login.html');

});

//this is the home page
$app->get('/home', function () {

    ob_start();
    include('./assets/scripts/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./view/home.html');
});

$app->get('/new', function() {
    include('./view/new_property.html');

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