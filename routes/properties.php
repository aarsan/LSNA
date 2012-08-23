<?php

// This URI adds a new property into the DB /
$app->post('/properties/add', function () {

	$street = $_POST['street'];
	$number = $_POST['number'];
	$zip = $_POST['zip'];

	require('./model/database.php');
	require('./model/properties.php');
	require('./model/properties_db.php');

	PropertiesDB::newProperty($street, $number, $zip);

});

?>