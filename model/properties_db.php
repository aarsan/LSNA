<?php

class PropertiesDB {
	public static function newProperty($property, $user_id) {

		$street = $property->getStreet();
		$number = $property->getNumber();
		$zip = $property->getZip();

		$db = Database::getDB();
		$db->beginTransaction();

		$query = "INSERT INTO properties
					(full_street_name, house_number, zip)
				  VALUES
				    (:street, :number, :zip)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':street', $street);
        $statement->bindValue(':number', $number);
        $statement->bindValue(':zip', $zip);
        $statement->execute();
        $prop_id = $db->LastInsertId();

        $query = "INSERT INTO queue
					  (prop_id, user_id)
				  VALUES
	              	  (:prop_id, :user_id)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':prop_id', $prop_id);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();

        $db->commit();
		$statement->closeCursor();
	}

	public static function listProperties() {
		$db = Database::getDB();
		$query = "SELECT * 
		          FROM properties";
		$statement = $db->prepare($query);
		$statement->execute();
		$properties = array();
			foreach ($statement as $row) {
				$property = new Property($row['full_street_name'], 
					                     $row['house_number'], 
					                     $row['zip']);
				$property->setPropId($row['prop_id']);
				$properties[] = $property;
			}
		return $properties;
		
		$statement->closeCursor();
	}
}

?>