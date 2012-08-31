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

	public static function updateAnswer($prop_id, $q_id, $answer) {
		$db = Database::getDB();
		$query = "UPDATE answers
                  SET answer_verb = :answer
                  WHERE prop_id = :prop_id AND q_id = :q_id";
        $statement = $db->prepare($query);
		$statement->bindValue(':prop_id', $prop_id);
		$statement->bindValue(':q_id', $q_id);
		$statement->bindValue(':answer', $answer);
        $statement->execute();
	}

	public static function listAnswers($prop_id) {
		$db = Database::getDB();
		$query = "SELECT questions.q_verb, answer_verb, answers.q_id, answers.prop_id
                  FROM answers
                  INNER JOIN questions on questions.q_id = answers.q_id
                  WHERE prop_id = :prop_id";
		$statement = $db->prepare($query);
		$statement->bindValue(':prop_id', $prop_id);
		$statement->execute();
		$answers = array();
			foreach ($statement as $row) {
				$answer = new Answer($row['answer_verb'],
					                 $row['q_id'],
					                 $row['prop_id']); 
				$answers[] = $answer;
			}
		return $answer;
		$statement->closeCursor();
	}

}
?>