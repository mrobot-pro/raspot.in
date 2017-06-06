<?php

class Validator {
	
	protected $admin;

	public function isAuthenticated($admin) {

	$this->_admin = $admin;
	return $admin;
	}
}