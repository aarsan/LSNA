<?php

class Answer {
	private $answer_id;
	private $answer_verb;
	private $q_id;
	private $prop_id;
    private $q_verb;

	public function __construct ($answer_verb, $q_id, $prop_id) {
		$this->answer_verb = $answer_verb;
        $this->q_id = $q_id;
        $this->prop_id = $prop_id;
	}

	public function getAnswerVerb() {
        return $this->answer_verb;
    }

    public function getQId() {
        return $this->q_id;
    }

    public function getPropId() {
        return $this->prop_id;
    }

    public function setQustionVerb($value) {
        $this->q_verb = $value;
    }

}

?>