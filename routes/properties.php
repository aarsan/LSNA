<?php

// This URI adds a new property into the DB /
$app->post('/properties/add', function () {

	$street = $_POST['street'];
	$number = $_POST['number'];
	$zip = $_POST['zip'];

	include('./view/temp.php');
	break;

	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');

	new Property($street, $number, $zip);

	PropertiesDB::newProperty($street, $number, $zip);



});

?>