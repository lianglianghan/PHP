<?php
//订单
class Order {
	private $o_id;
	private $o_item_id;
	private $o_user_id;
	private $o_date;
	private $_isordered;
	private $o_nums;
	private $o_price;
	private $o_total_price;
	private $o_isevaluated;
	
	//订单集合
	private $i_arr;
	/**
	 * @return the $o_id
	 */
	public function getO_id() {
		return $this->o_id;
	}

	/**
	 * @return the $o_item_id
	 */
	public function getO_item_id() {
		return $this->o_item_id;
	}

	/**
	 * @return the $o_user_id
	 */
	public function getO_user_id() {
		return $this->o_user_id;
	}

	/**
	 * @return the $o_date
	 */
	public function getO_date() {
		return $this->o_date;
	}

	/**
	 * @return the $_isordered
	 */
	public function getIsordered() {
		return $this->_isordered;
	}

	/**
	 * @return the $o_nums
	 */
	public function getO_nums() {
		return $this->o_nums;
	}

	/**
	 * @return the $o_price
	 */
	public function getO_price() {
		return $this->o_price;
	}

	/**
	 * @return the $o_total_price
	 */
	public function getO_total_price() {
		return $this->o_total_price;
	}

	/**
	 * @param field_type $o_id
	 */
	public function setO_id($o_id) {
		$this->o_id = $o_id;
	}

	/**
	 * @param field_type $o_item_id
	 */
	public function setO_item_id($o_item_id) {
		$this->o_item_id = $o_item_id;
	}

	/**
	 * @param field_type $o_user_id
	 */
	public function setO_user_id($o_user_id) {
		$this->o_user_id = $o_user_id;
	}

	/**
	 * @param field_type $o_date
	 */
	public function setO_date($o_date) {
		$this->o_date = $o_date;
	}

	/**
	 * @param field_type $_isordered
	 */
	public function setIsordered($_isordered) {
		$this->_isordered = $_isordered;
	}

	/**
	 * @param field_type $o_nums
	 */
	public function setO_nums($o_nums) {
		$this->o_nums = $o_nums;
	}

	/**
	 * @param field_type $o_price
	 */
	public function setO_price($o_price) {
		$this->o_price = $o_price;
	}

	/**
	 * @param field_type $o_total_price
	 */
	public function setO_total_price($o_total_price) {
		$this->o_total_price = $o_total_price;
	}
	/**
	 * @return the $o_isevaluated
	 */
	public function getO_isevaluated() {
		return $this->o_isevaluated;
	}

	/**
	 * @param field_type $o_isevaluated
	 */
	public function setO_isevaluated($o_isevaluated) {
		$this->o_isevaluated = $o_isevaluated;
	}
	/**
	 * @return the $i_arr
	 */
	public function getI_arr() {
		return $this->i_arr;
	}

	/**
	 * @param field_type $i_arr
	 */
	public function setI_arr($i_arr) {
		$this->i_arr = $i_arr;
	}



}

?>