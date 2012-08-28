<?php

$app->get('/users/register', function () {
    include('./view/new_user_form.php');

});

$app->post('/users/add', function () {

});

?>