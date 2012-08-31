<?php

/////////// *** adds a new property into the DB *** //////////
$app->post('/properties/add', function () {

	$user_id = $_SESSION['user_id'];

	$street = $_POST['street'];
	$number = $_POST['number'];
	$number = intval($number);
	$zip = $_POST['zip'];
	$zip = intval($zip);

	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');

	$property = new Property($street, $number, $zip);
	PropertiesDB::newProperty($property, $user_id);

	header("Location: /properties/list");
	break;

});


///////////////////////////////////////////////////////////////////

$app->get('/properties/list', function () {
	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');

	$properties = PropertiesDB::listProperties();
	$action = "<a href=\"/users/logout\">logout</a>";
	include('./view/all_properties.php');

});

/////////////////////////////////////////////////////////////////////////

$app->get('/properties/new', function () {
    
    ob_start();
    include('./assets/scripts/post.js');
    $ajax = ob_get_contents();
    ob_end_clean();
    $action = "<a href=\"/users/logout\">logout</a>";
    include('./view/new_property.php');

});


///////////////////////// *** MODIFY PROPERTY *** /////////////////////////////////

$app->get('/properties/modify/:prop_id', function ($prop_id) {
	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');
	require('./model/questions.php');
	require('./model/questions_db.php');

    $unanswered_question_count = QuestionsDB::unAnsweredQuestionCount($prop_id);
    $unanswered_question_count = intval($unanswered_question_count);
    
    if ($unanswered_question_count == 0) {
    	$message = "You completed all the questions for this property.</br>
    	            <p>Click the submit button if you're ready to commit the answers.</p>
    	            <form method=\"post\" action=\"/property/submit\">
    	            <input type=\"hidden\" name=\"prop_id\" value=\"$prop_id\" />
    	            <input type=\"submit\" value=\"Submit the Property\" /></form>";
    } else {
    	$message = "Click on the question to answer it.";
    }
    
    $property = PropertiesDB::getPropertyInfo($prop_id);
    $street = $property->getStreet();
    $number = $property->getNumber();
    $zip = $property->getZip();

    $property_name = $number . $street . $zip;

	$answered_questions = QuestionsDB::answeredQuestions($prop_id);
	$unanswered_questions = QuestionsDB::unAnsweredQuestions($prop_id);
	$action = "<a href=\"/users/logout\">logout</a>";
	include('./view/mod_property.php');
});


////////////////////////////////////////////////////////////////////////////////

$app->get('/properties/:prop_id/question/:q_id', function ($prop_id, $q_id) {
	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');
	require('./model/questions.php');
	require('./model/questions_db.php');

	$question = QuestionsDB::getQuestion($q_id)->getQVerb();
	$action = "<a href=\"/users/logout\">logout</a>";

	if ($q_id == 1) {
		$option1 = "Occupied";
		$option2 = "Vacant";
	} else {
		$option1 = "Yes";
		$option2 = "No"; 
	}
	
	include('./view/question.php');

});

////////////////////////// *** MODIFY ANSWER FORM *** ///////////////////////////

$app->get('/properties/:prop_id/question/:q_id/update', function ($prop_id, $q_id) {
	require('./model/database.php');
	require('./model/answers_db.php');
    
    $action = "<a href=\"/users/logout\">logout</a>";
	$answer = AnswersDB::selectAnswer($prop_id, $q_id);

	if ($q_id == 1) {
		$option1 = "Occupied";
		$option2 = "Vacant";
	} else {
		$option1 = "Yes";
		$option2 = "No"; 
	}

	include('./view/modify_answer.php');

});

////////////////////////// *** UPDATE ANSWER *** //////////////////////////////////////

$app->post('/properties/:prop_id/question/:q_id/update', function ($prop_id, $q_id) {
	require('./model/database.php');
	require('./model/answers_db.php');

	if(isset($_POST['answer_verb'])) {
		$answer = $_POST['answer_verb'];

	} else {
		//return an error
	}

	AnswersDB::updateAnswer($prop_id, $q_id, $answer);
    header("Location: /properties/modify/$prop_id");
	break;

});


///////////////////////////////////////////////////////////////////////////////

$app->post('/properties/:prop_id/question/:q_id', function ($prop_id, $q_id) {

	if (isset($_POST['answer_verb'])) {
		$answer_verb = $_POST['answer_verb'];
	}

	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');
	require('./model/questions.php');
	require('./model/questions_db.php');
	require('./model/answers.php');
	require('./model/answers_db.php');

	$answer = new Answer($answer_verb, $q_id, $prop_id);
    AnswersDB::newAnswer($answer);

    header("Location: /properties/modify/$prop_id");
	break;

});

/////////// *** SUBMIT COMPLETED PROPERTY *** ///////////////////////
$app->post('/property/submit', function () {
	require('./model/database.php');
	require('./model/properties_db.php');

	if (isset($_POST['prop_id'])) {
		$prop_id = $_POST['prop_id'];
	}

	$user_id = $_SESSION['user_id'];
	PropertiesDB::submitCompletedProperty($prop_id, $user_id);
	header("Location: /home");
	break;

});

///////////// *** VIEW PROPERTY INFORMATION / QUESTIONS *** ///////////////
$app->get('/properties/:prop_id/view', function ($prop_id) {
	require('./model/database.php');
	require('./model/properties_db.php');
	require('./model/properties.php');
	require('./model/answers_db.php');
	require('./model/answers.php');

	$property = PropertiesDB::getPropertyInfo($prop_id);
	
    $street = $property->getStreet();
    $number = $property->getNumber();
    $zip = $property->getZip();

    $property_name = $number . $street . $zip;

    $answers = AnswersDB::listAnswers($prop_id);

	include('./view/view_property.php');

});

?>