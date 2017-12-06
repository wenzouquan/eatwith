<?php
namespace phpkit\dict\models;

class SystemDict extends \phpkit\base\BaseModel {
	protected $value;
	public function initialize() {
		parent::initialize();
	}

	public function getValue() {
		return json_decode($this->value, ture);
	}

	public function setValue($value) {
		$this->value = json_encode($value);
	}

}
