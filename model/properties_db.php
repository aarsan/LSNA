<?php

class PropertiesDB {
	public static function newProperty($property) {

		$street = $property->getStreet();
		$number = $property->getNumber();
		$zip = $property->getZip();

		$db = Database::getDB();
		$query = "INSERT INTO properties
					(DEFAULT, full_street_name, house_number, zip)
				  VALUES
				    (:street, :number, :zip)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':street', $street);
        $statement->bindValue(':number', $number);
        $statement->bindValue(':zip', $zip);
        $statement->execute();
		$statement->closeCursor();
	}
}

?>