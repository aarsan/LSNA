<?php

class AnswersDB {
	public static function newAnswer($answer) {
		$answer_verb = $answer->getAnswerVerb();
		$q_id = $answer->getQId();
		$prop_id = $answer->getPropId();
		
		$db = Database::getDB();
		$query = "INSERT INTO answers
					 (answer_verb, q_id, prop_id)
				  VALUES 
				     (:answer_verb, :q_id, :prop_id)";
		$statement = $db->prepare($query);
		$statement->bindValue(':answer_verb', $answer_verb);
        $statement->bindValue(':q_id', $q_id);
        $statement->bindValue(':prop_id', $prop_id);
        $statement->execute();
	}
}
?>