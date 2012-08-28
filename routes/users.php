<?php
session_start();

$app->get('/users/register', function () {
	$action = "<a href=\"/users/login\">login</a>";
    include('./view/register.php');

});

$app->get('/users/login', function () {
	$action = "<a href=\"/users/register\">register</a>";
    include('./view/login.php');

});

$app->get('/users/logout', function () {
	$_SESSION = array();
    session_destroy();
    header("Location: /users/login");
	break;

});

$app->post('/users/add', function () {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	require('./model/database.php');
	require('./model/users.php');
	require('./model/users_db.php');
	$user = new User($first_name, $last_name, $email, $password);
	UsersDB::newUser($user);
	header("Location: /home");
	break;

});

$app->post('/users/login', function () {

	$email = $_POST['email'];
	$password = $_POST['password'];
	require('./model/database.php');
	require('./model/users_db.php');
	$valid = UsersDB::isValidUser($email, $password);

	if ($valid == TRUE) {
		$_SESSION['is_valid_member'] = TRUE;
		//$user_id = UsersDB::getUserInfo()->getUserId($email);
		$_SESSION['user_id'] = UsersDB::getUserInfo()->getUserId($email);
        header("Location: /home");
        break;
    } else {
        $error = "<div id=\"content\"><h2>Password is incorrect.</h2></div>";
        include('./view/errors/error.php');
        break;
    }

});

?>