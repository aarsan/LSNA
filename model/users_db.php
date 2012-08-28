<?php

class UsersDB {

	public static function newUser($user) {

		$first_name = $user->getFirstName();
		$last_name = $user->getLastName();
		$email = $user->getEmail();
		$password = $user->getPassword();

		$db = Database::getDB();
		$query = "INSERT INTO users
					(first_name, last_name, email, password)
				  VALUES
				    (:first_name, :last_name, :email, :password)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
		$statement->closeCursor();
	}

	public static function isValidUser($email, $password) {
		
        $db = Database::getDB();
        $query = "SELECT user_id, password
                  FROM users
                  WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        return $row ? ($row['password'] == $password, $row['password']) : FALSE;
    }

}

?>