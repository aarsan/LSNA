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

	public static function getAnswerCount($prop_id) {
		$db = Database::getDB();
		$query = "SELECT COUNT(answer_id) AS a_count
		          FROM answers
		          WHERE prop_id = :prop_id";
		$statement = $db->prepare($query);
		$statement->bindValue(':prop_id', $prop_id);
        $statement->execute();
        $a_count = $statement->fetch();
		$a_count = $a_count['a_count'];
		return $a_count;

	}

	public static function selectAnswer($prop_id, $q_id) {
		$db = Database::getDB();
		$query = "SELECT answers.answer_id, questions.q_verb, answers.answer_verb
                  FROM answers
                  INNER JOIN questions ON questions.q_id = answers.q_id
                  WHERE prop_id = :prop_id AND questions.q_id = :q_id";
        $statement = $db->prepare($query);
		$statement->bindValue(':prop_id', $prop_id);
		$statement->bindValue(':q_id', $q_id);
        $statement->execute();
        $answer = $statement->fetch();
        return $answer;


	}
}
?>