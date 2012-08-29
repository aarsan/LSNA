<?php

class Question {
	private $q_id;
	private $q_verb;

	public function __construct($q_verb) {
    $this->q_verb = $q_verb;
    }

    public function getQId() {
        return $this->q_id;
    }

    public function getQVerb() {
        return $this->q_verb;
    }

    public function setQVerb($value) {
        $this->q_verb = $value;
    }

}

?>