<?php

$app->get('/users/register', function () {
    include('./view/user_register.php');

});

$app->post('/users/add', function () {

});

?>