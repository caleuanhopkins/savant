<?php

require_once('sv-core.php');

class Installation extends svcore {

	public function __construct() {

	}

	public function loadStep1() {
		include_once($this->mainDir.'/system/extend/templates/installation/step1.php');
	}

	public function processForums() {

	}

	private function createDb() {

	}

}