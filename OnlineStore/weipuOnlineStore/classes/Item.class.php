<?php
class Item {
	private $i_id;
	private $i_name;
	private $i_store_id;
	private $i_price;
	private $i_nums;
	private $i_introduce;
	private $i_province;
	private $i_category;
	private $i_picture;
	
	// 所有的商品集合
	private $i_arr;
	
	// 商品搜索的字段
	private $key;
	/**
	 *
	 * @return the $i_id
	 */
	public function getI_id() {
		return $this->i_id;
	}
	
	/**
	 *
	 * @return the $i_name
	 */
	public function getI_name() {
		return $this->i_name;
	}
	
	/**
	 *
	 * @return the $i_store_id
	 */
	public function getI_store_id() {
		return $this->i_store_id;
	}
	
	/**
	 *
	 * @return the $i_price
	 */
	public function getI_price() {
		return $this->i_price;
	}
	
	/**
	 *
	 * @return the $i_nums
	 */
	public function getI_nums() {
		return $this->i_nums;
	}
	
	/**
	 *
	 * @return the $i_introduce
	 */
	public function getI_introduce() {
		return $this->i_introduce;
	}
	
	/**
	 *
	 * @return the $i_province
	 */
	public function getI_province() {
		return $this->i_province;
	}
	
	/**
	 *
	 * @return the $i_category
	 */
	public function getI_category() {
		return $this->i_category;
	}
	
	/**
	 *
	 * @param field_type $i_id        	
	 */
	public function setI_id($i_id) {
		$this->i_id = $i_id;
	}
	
	/**
	 *
	 * @param field_type $i_name        	
	 */
	public function setI_name($i_name) {
		$this->i_name = $i_name;
	}
	
	/**
	 *
	 * @param field_type $i_store_id        	
	 */
	public function setI_store_id($i_store_id) {
		$this->i_store_id = $i_store_id;
	}
	
	/**
	 *
	 * @param field_type $i_price        	
	 */
	public function setI_price($i_price) {
		$this->i_price = $i_price;
	}
	
	/**
	 *
	 * @param field_type $i_nums        	
	 */
	public function setI_nums($i_nums) {
		$this->i_nums = $i_nums;
	}
	
	/**
	 *
	 * @param field_type $i_introduce        	
	 */
	public function setI_introduce($i_introduce) {
		$this->i_introduce = $i_introduce;
	}
	
	/**
	 *
	 * @param field_type $i_province        	
	 */
	public function setI_province($i_province) {
		$this->i_province = $i_province;
	}
	
	/**
	 *
	 * @param field_type $i_category        	
	 */
	public function setI_category($i_category) {
		$this->i_category = $i_category;
	}
	/**
	 *
	 * @return the $i_picture
	 */
	public function getI_picture() {
		return $this->i_picture;
	}
	
	/**
	 *
	 * @param field_type $i_picture        	
	 */
	public function setI_picture($i_picture) {
		$this->i_picture = $i_picture;
	}
	/**
	 *
	 * @return the $i_arr
	 */
	public function getI_arr() {
		return $this->i_arr;
	}
	
	/**
	 *
	 * @param field_type $i_arr        	
	 */
	public function setI_arr($i_arr) {
		$this->i_arr = $i_arr;
	}
	/**
	 * @return the $key
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @param field_type $key
	 */
	public function setKey($key) {
		$this->key = $key;
	}

}

?>