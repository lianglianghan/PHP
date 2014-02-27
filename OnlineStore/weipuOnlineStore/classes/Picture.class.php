<?php

//用来描述商品图片的类
class Picture{
	private $p_id;
	private $p_path;
	/**
	 * @return the $p_id
	 */
	public function getP_id() {
		return $this->p_id;
	}

	/**
	 * @return the $p_path
	 */
	public function getP_path() {
		return $this->p_path;
	}

	/**
	 * @param field_type $p_id
	 */
	public function setP_id($p_id) {
		$this->p_id = $p_id;
	}

	/**
	 * @param field_type $p_path
	 */
	public function setP_path($p_path) {
		$this->p_path = $p_path;
	}

}
?>