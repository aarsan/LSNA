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

?>