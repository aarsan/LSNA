<?php

class QuestionsDB {
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

	public static function getQuestion($q_id) {
		$db = Database::getDB();
		$query = "SELECT q_verb
		          FROM questions
		          WHERE q_id = :q_id";
		$statement = $db->prepare($query);
		$statement->bindValue(':q_id', $q_id);
		$statement->execute();
		$row = $statement->fetch();
		$question = new Question($row['q_verb']);
		return $question;
		$statement->closeCursor();

	}

}

?>