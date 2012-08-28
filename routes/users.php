<?php

$app->get('/users/register', function () {
    include('./view/user_register.php');

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

	header("Location: /login");
	break;

});

$app->post('/users/login', function () {

	$email = $_POST['email'];
	$password = $_POST['password'];
/*
	require('./model/database.php');
	require('./model/users_db.php');

	$valid = UsersDB::isValidUser($email, $password);

	if ($valid == TRUE) {
		$_SESSION['is_valid_member'] = TRUE;
        header("Location: /home");
        break;

    } else {
        $error = "<div id=\"content\"><h2>Password is incorrect.</h2><p>please go back and enter your correct password</p><a href=\"/profiles/$member_ID\">go back</a></div>";
        include('./view/errors/error.php');
        break;
    }
*/
});

?>