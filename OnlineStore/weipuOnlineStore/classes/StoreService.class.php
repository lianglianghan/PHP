<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';
class StoreService {
	
	/**
	 * 对商店信息进行初始化
	 *
	 * @param Object $store        	
	 * @return number 0失败 1成功影响 2失败没有影响
	 */
	public function initStore($store) {
		// $store = new Store ();
		$s_name = $store->getS_name ();
		$s_introduce = $store->getS_introduce ();
		$s_user_id = $store->getS_user_id ();
		$s_picture = $store->getS_picture ();
		
		$sql = "insert into w_store (s_name,s_introduce,s_user_id,s_picture) values ('$s_name','$s_introduce',$s_user_id,'$s_picture')";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		$sqlHelper->close_connect ();
		
		return $flag;
	}
	
	// 获得店铺的id
	public function getStoreId($store) {
		// $store = new Store ();
		$s_user_id = $store->getS_user_id ();
		
		$sql = "select s_id from w_store where s_user_id=$s_user_id";
		// echo $sql;
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		// print_r($res);
		if (count ( $res ) > 0) {
			$store->setS_id ( $res [0] [0] );
		}
	}
	
	// 获得店主的id号
	public function getOwnerId($store) {
		//$store = new Store ();
		$s_id = $store->getS_id ();
		
		$sql = "select s_user_id from w_store where s_id='$s_id'";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		$sqlHelper->close_connect ();
		
		$store->setS_user_id ( $res [0] [0] );
	}
}

?>