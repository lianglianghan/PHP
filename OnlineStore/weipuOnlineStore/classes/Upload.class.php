<?php

class Upload{
	private $file;
	private $userid;
	private $file_final_name;
	private $flag;
	/**
	 * @return the $file
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @return the $userid
	 */
	public function getUserid() {
		return $this->userid;
	}

	/**
	 * @return the $file_final_name
	 */
	public function getFile_final_name() {
		return $this->file_final_name;
	}

	/**
	 * @param field_type $file
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * @param field_type $userid
	 */
	public function setUserid($userid) {
		$this->userid = $userid;
	}

	/**
	 * @param field_type $file_final_name
	 */
	public function setFile_final_name($file_final_name) {
		$this->file_final_name = $file_final_name;
	}
	/**
	 * @return the $flag
	 */
	public function getFlag() {
		return $this->flag;
	}

	/**
	 * @param field_type $flag
	 */
	public function setFlag($flag) {
		$this->flag = $flag;
	}


}

?>