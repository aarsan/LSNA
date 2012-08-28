<?php

class User {
	private $user_id;
	private $first_name;
	private $last_name;
	private $email;
	private $password;

	public function __construct($first_name, $last_name, $email, $user_id = NULL, $password = NULL) {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;

    }
    public function getUserId() {
        return $this->user_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
    	return $this->password;
    }

}
?>