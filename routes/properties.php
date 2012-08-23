<?php

// This URI adds a new property into the DB /
$app->post('/properties/add', function () {

	$street = $_POST['street'];
	$number = $_POST['number'];
	$number = intval($number);
	$zip = $_POST['zip'];
	$zip = intval($zip);

	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');

	$property = new Property($street, $number, $zip);
	PropertiesDB::newProperty($property);

	header("Location: /properties/list");
	break;

});

$app->get('/properties/list', function () {
	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');

	PropertiesDB::listProperties();
	include('./view/all_properties.php');

});

?>