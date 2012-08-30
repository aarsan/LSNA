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
    require('./model/questions_db.php');

    ob_start();
    include('./assets/scripts/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();

    $q_count = QuestionsDB::getQuestionCount();
    //$a_count = AnswersDB::getAnswerCount($prop_id);
    $a_count = 4;

    $action = "<a href=\"/users/logout\">logout</a>";
    $properties = PropertiesDB::viewQueue($user_id);
    include('./view/home.php');

});


?>