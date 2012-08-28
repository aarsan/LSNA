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

    include('./view/home.html');
});


?>