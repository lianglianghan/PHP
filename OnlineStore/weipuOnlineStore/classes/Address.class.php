<?php

class Address{
	private $a_id;
	private $a_mobile;
	private $a_name;
	private $a_address;
	/**
	 * @return the $a_id
	 */
	public function getA_id() {
		return $this->a_id;
	}

	/**
	 * @return the $a_mobile
	 */
	public function getA_mobile() {
		return $this->a_mobile;
	}

	/**
	 * @return the $a_name
	 */
	public function getA_name() {
		return $this->a_name;
	}

	/**
	 * @return the $a_address
	 */
	public function getA_address() {
		return $this->a_address;
	}

	/**
	 * @param field_type $a_id
	 */
	public function setA_id($a_id) {
		$this->a_id = $a_id;
	}

	/**
	 * @param field_type $a_mobile
	 */
	public function setA_mobile($a_mobile) {
		$this->a_mobile = $a_mobile;
	}

	/**
	 * @param field_type $a_name
	 */
	public function setA_name($a_name) {
		$this->a_name = $a_name;
	}

	/**
	 * @param field_type $a_address
	 */
	public function setA_address($a_address) {
		$this->a_address = $a_address;
	}

}

?>