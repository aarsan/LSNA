<?php

class PropertiesDB {
	public static function newProperty($property) {

		$street = $property->getStreet();
		$number = $property->getNumber();
		$zip = $property->getZip();

		$db = Database::getDB();
		$query = "INSERT INTO properties
					(full_street_name, house_number, zip)
				  VALUES
				    (:street, :number, :zip)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':street', $street);
        $statement->bindValue(':number', $number);
        $statement->bindValue(':zip', $zip);
        $statement->execute();
		$statement->closeCursor();
	}

	public static function listProperties() {
		$db = Database::getDB();
		$query = "SELECT * 
		          FROM properties";
		$statement = $db->prepare($query);
		$statement->execute();
		$statement->closeCursor();
	}
}

?>