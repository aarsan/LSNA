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

$app->get('/search', function () {
    include('./view/search.html');

});

$app->get('/new', function() {
    
    ob_start();
    include('./assets/scripts/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./view/new_property.html');

});

$app->post('/verify/address', function () {

    ob_start();
    include('./assets/scripts/query.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./view/form.html');
    //die;

});

$app->get('/verify/address', function () {

    $key = "search :";
    $value = $_POST['street'];
    $value = "'$value'";
    $left = "{";
    $right = "}";

    $dataset = $left. " " .$key. " " .$value. " " .$right;
    
include('./view/temp.php');
break;

    ob_start();
    include('./assets/scripts/query.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./view/lsna.html');

});

?>