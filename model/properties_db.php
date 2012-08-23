<?php

class PropertiesDB {
	public static function newProperty($street, $number, $zip) {
		$db = Database::getDB();
		$query = "INSERT INTO properties
					(full_street_name, house_number, zip)
				  VALUES
				    (:street, :number, :zip)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':street', $street);
        $statement->bindValue(':number', $number);
        $statement->bindValue(':zip', $zip);
	}
}

?>