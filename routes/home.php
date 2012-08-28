<?php

$app->get('/home', function () {

	if (!isset($_SESSION['is_valid_member'])) {
        header("Location: /users/login");
        break;
    }

    $user_id = $_SESSION['user_id'];
    

    require('./model/database.php');
    require('./model/properties.php');
    require('./model/properties_db.php');

    $properties = PropertiesDB::viewQueue($user_id);
    include('./view/temp.php');
    break;

    ob_start();
    include('./assets/scripts/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    $action = "<a href=\"/users/logout\">logout</a>";

    $properties = PropertiesDB::viewQueue($user_id);
    include('./view/home.php');

});


?>