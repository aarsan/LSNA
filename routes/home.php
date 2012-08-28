<?php

$app->get('/home', function () {

	if (!isset($_SESSION['is_valid_member'])) {
        header("Location: /users/login");
        break;
    }

    ob_start();
    include('./assets/scripts/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    $action = "<a href=\"/users/logout\">logout</a>";
    include('./view/home.html');

});


?>