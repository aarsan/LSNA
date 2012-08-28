<?php


//this redirects from root to login page
$app->get('/', function () {
    header("Location: /users/login");
    break;

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

    $key = "search :";
    $value = $_POST['street'];
    $value = "'$value'";
    $left = "{";
    $right = "}";

    $url = "'http://data.cityofchicago.org/api/views/i6bp-fvbx/rows.json?jsonp=?'";
    $dataset = $left. " " .$key. " " .$value. " " .$right. ",";

    ob_start();
    include('./assets/scripts/street_match.js');
    $response = ob_get_contents();
    ob_end_clean();

    ob_start();
    include('./assets/scripts/query.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./view/form.html');

});

$app->get('/select/street/:id', function ($id) {

    $url = "'http://data.cityofchicago.org/api/views/i6bp-fvbx/rows/$id.json?jsonp=?'";
    $dataset = "'',";

    ob_start();
    include('./assets/scripts/street_select.js');
    $response = ob_get_contents();
    ob_end_clean();    

    ob_start();
    include('./assets/scripts/query.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    include('./view/form.html');

});

?>