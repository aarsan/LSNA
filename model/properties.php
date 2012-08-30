<?php
class Property {
	private $prop_id;
	private $street;
	private $number;
	private $zip;
    private $a_count;

	public function __construct($street, $number, $zip) {
        $this->street = $street;
        $this->number = $number;
        $this->zip = $zip;
    }
    
    public function getPropId() {
        return $this->prop_id;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getAnswerCount() {
        return $this->a_count;
    }

    public function setPropId($value) {
        $this->prop_id = $value;
    }
}
?>