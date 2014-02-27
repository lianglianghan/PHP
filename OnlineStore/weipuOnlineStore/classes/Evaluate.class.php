<?php
class Evaluate {
	private $e_id;
	private $e_user_id;
	private $e_order_id;
	private $e_date;
	private $e_info;
	/**
	 * @return the $e_id
	 */
	public function getE_id() {
		return $this->e_id;
	}

	/**
	 * @return the $e_user_id
	 */
	public function getE_user_id() {
		return $this->e_user_id;
	}

	/**
	 * @return the $e_order_id
	 */
	public function getE_order_id() {
		return $this->e_order_id;
	}

	/**
	 * @return the $e_date
	 */
	public function getE_date() {
		return $this->e_date;
	}

	/**
	 * @param field_type $e_id
	 */
	public function setE_id($e_id) {
		$this->e_id = $e_id;
	}

	/**
	 * @param field_type $e_user_id
	 */
	public function setE_user_id($e_user_id) {
		$this->e_user_id = $e_user_id;
	}

	/**
	 * @param field_type $e_order_id
	 */
	public function setE_order_id($e_order_id) {
		$this->e_order_id = $e_order_id;
	}

	/**
	 * @param field_type $e_date
	 */
	public function setE_date($e_date) {
		$this->e_date = $e_date;
	}
	/**
	 * @return the $e_info
	 */
	public function getE_info() {
		return $this->e_info;
	}

	/**
	 * @param field_type $e_info
	 */
	public function setE_info($e_info) {
		$this->e_info = $e_info;
	}


}

?>