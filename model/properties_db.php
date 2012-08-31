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

	public static function viewQueue($user_id) {
		$db = Database::getDB();
		$query = "SELECT properties.prop_id, full_street_name, 
		                 house_number, zip, (SELECT count(answer_id) 
                                             FROM answers
                                             INNER JOIN properties ON answers.prop_id = properties.prop_id
                                             WHERE queue.prop_id = answers.prop_id) AS a_count
                  FROM properties
                  INNER JOIN queue ON queue.prop_id = properties.prop_id
                  WHERE queue.user_id = :user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $properties = array();
			foreach ($statement as $row) {
				$property = new Property($row['full_street_name'], 
					                     $row['house_number'], 
					                     $row['zip']);
				$property->setPropId($row['prop_id']);
				$property->setAnswerCount($row['a_count']);
				$properties[] = $property;
			}
		return $properties;
		
		$statement->closeCursor();
	}

	public static function submitCompletedProperty($prop_id, $user_id) {
		$db = Database::getDB();
		$db->beginTransaction();
        
        $query = "INSERT INTO passes
	              	(prop_id, user_id)
                  VALUES
	                (:prop_id, :user_id)";
	    $statement = $db->prepare($query);
        $statement->bindValue(':prop_id', $prop_id);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();

	    $query = "DELETE FROM queue
                  WHERE prop_id = :prop_id AND user_id = :user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':prop_id', $prop_id);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();

		$db->commit();

		$statement->closeCursor();

	}

	public static function getPropertyInfo($prop_id) {
		$db = Database::getDB();
		$query = "SELECT * FROM properties
		          WHERE prop_id = :prop_id";
		$statement = $db->prepare($query);
        $statement->bindValue(':prop_id', $prop_id);
        $statement->execute();
        $property = $statement->fetch();
        $property = new Property($property['full_street_name'], 
					             $property['house_number'], 
					             $property['zip']);
        return $property;
		$statement->closeCursor();
	}
}

?>