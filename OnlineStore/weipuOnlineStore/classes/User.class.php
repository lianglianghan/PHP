<?php
class User {
	private $u_id;
	private $u_password;
	private $u_email;
	private $u_nickname;
	private $u_mobile;
	private $u_grade;
	private $u_isowner;
	
	/**
	 * @return the $u_id
	 */
	public function getU_id() {
		return $this->u_id;
	}

	/**
	 * @return the $u_password
	 */
	public function getU_password() {
		return $this->u_password;
	}

	/**
	 * @return the $u_email
	 */
	public function getU_email() {
		return $this->u_email;
	}

	/**
	 * @return the $u_nickname
	 */
	public function getU_nickname() {
		return $this->u_nickname;
	}

	/**
	 * @return the $u_mobile
	 */
	public function getU_mobile() {
		return $this->u_mobile;
	}

	/**
	 * @return the $u_grade
	 */
	public function getU_grade() {
		return $this->u_grade;
	}

	/**
	 * @return the $u_isowner
	 */
	public function getU_isowner() {
		return $this->u_isowner;
	}

	/**
	 * @param field_type $u_id
	 */
	public function setU_id($u_id) {
		$this->u_id = $u_id;
	}

	/**
	 * @param field_type $u_password
	 */
	public function setU_password($u_password) {
		$this->u_password = $u_password;
	}

	/**
	 * @param field_type $u_email
	 */
	public function setU_email($u_email) {
		$this->u_email = $u_email;
	}

	/**
	 * @param field_type $u_nickname
	 */
	public function setU_nickname($u_nickname) {
		$this->u_nickname = $u_nickname;
	}

	/**
	 * @param field_type $u_mobile
	 */
	public function setU_mobile($u_mobile) {
		$this->u_mobile = $u_mobile;
	}

	/**
	 * @param field_type $u_grade
	 */
	public function setU_grade($u_grade) {
		$this->u_grade = $u_grade;
	}

	/**
	 * @param field_type $u_isowner
	 */
	public function setU_isowner($u_isowner) {
		$this->u_isowner = $u_isowner;
	}

}

?>