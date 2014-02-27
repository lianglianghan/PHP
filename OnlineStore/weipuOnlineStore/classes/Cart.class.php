<?php
//购物车
class Cart {
	private $c_user_id;
	private $c_item_id;
	private $c_item_nums;
	/**
	 * @return the $c_user_id
	 */
	public function getC_user_id() {
		return $this->c_user_id;
	}

	/**
	 * @return the $c_item_id
	 */
	public function getC_item_id() {
		return $this->c_item_id;
	}

	/**
	 * @return the $c_item_nums
	 */
	public function getC_item_nums() {
		return $this->c_item_nums;
	}

	/**
	 * @param field_type $c_user_id
	 */
	public function setC_user_id($c_user_id) {
		$this->c_user_id = $c_user_id;
	}

	/**
	 * @param field_type $c_item_id
	 */
	public function setC_item_id($c_item_id) {
		$this->c_item_id = $c_item_id;
	}

	/**
	 * @param field_type $c_item_nums
	 */
	public function setC_item_nums($c_item_nums) {
		$this->c_item_nums = $c_item_nums;
	}

}

?>