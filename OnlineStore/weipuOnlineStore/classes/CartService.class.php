<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';

class CartService {
	
	public function addCart($cart){
		//$cart=new Cart();
		$c_user_id=$cart->getC_user_id();
		$c_item_nums=$cart->getC_item_nums();
		$c_item_id=$cart->getC_item_id();
		
		$sql="insert into w_cart (c_user_id,c_item_nums,c_item_id) values ($c_user_id,$c_item_nums,$c_item_id)";
		
// 		echo $sql;
// 		exit();

		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		$sqlHelper->close_connect ();
		
		return $flag;
	}
}

?>