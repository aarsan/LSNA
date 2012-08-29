<?php

class PropertiesDB {
	public static function listQuestions() {
		$db = Database::getDB();
		$query = "SELECT * 
		          FROM questions";
		$statement = $db->prepare($query);
		$statement->execute();
		$questions = array();
			foreach ($statement as $row) {
				$question = new Question($row['q_verb']); 
				$question->setQId($row['q_id']);
				$questions[] = $question;
			}
		return $questions;
		
		$statement->closeCursor();
	}

}

?>