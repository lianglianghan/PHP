<?php
class Store {
	private $s_id;
	private $s_name;
	private $s_introduce;
	private $s_user_id;
	private $s_grade;
	private $s_picture;
	/**
	 * @return the $s_id
	 */
	public function getS_id() {
		return $this->s_id;
	}

	/**
	 * @return the $s_name
	 */
	public function getS_name() {
		return $this->s_name;
	}

	/**
	 * @return the $s_introduce
	 */
	public function getS_introduce() {
		return $this->s_introduce;
	}

	/**
	 * @return the $s_user_id
	 */
	public function getS_user_id() {
		return $this->s_user_id;
	}

	/**
	 * @return the $s_grade
	 */
	public function getS_grade() {
		return $this->s_grade;
	}

	/**
	 * @param field_type $s_id
	 */
	public function setS_id($s_id) {
		$this->s_id = $s_id;
	}

	/**
	 * @param field_type $s_name
	 */
	public function setS_name($s_name) {
		$this->s_name = $s_name;
	}

	/**
	 * @param field_type $s_introduce
	 */
	public function setS_introduce($s_introduce) {
		$this->s_introduce = $s_introduce;
	}

	/**
	 * @param field_type $s_user_id
	 */
	public function setS_user_id($s_user_id) {
		$this->s_user_id = $s_user_id;
	}

	/**
	 * @param field_type $s_grade
	 */
	public function setS_grade($s_grade) {
		$this->s_grade = $s_grade;
	}
	/**
	 * @return the $s_picture
	 */
	public function getS_picture() {
		return $this->s_picture;
	}

	/**
	 * @param field_type $s_picture
	 */
	public function setS_picture($s_picture) {
		$this->s_picture = $s_picture;
	}


}

?>