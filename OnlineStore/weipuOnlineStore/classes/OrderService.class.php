<?php

require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';

class OrderService {
	
	//增加新的订单
	public function addOrder($order){
		//$order=new Order();
		$o_item_id=$order->getO_item_id();
		$o_user_id=$order->getO_user_id();
		$o_nums=$order->getO_nums();
		$o_price=$order->getO_price();
		$o_total_price=$order->getO_total_price();
		$o_date=$order->getO_date();
		$o_isordered=$order->getIsordered();
		
		$sql="insert into w_order (o_item_id,o_user_id,o_nums,o_price,o_total_price,o_date,o_isordered) values ($o_item_id,$o_user_id,$o_nums,$o_price,$o_total_price,'$o_date','$o_isordered')";
		
// 		echo $sql;
// 		exit();

		$sqlHelper=new SqlHelper();
		$flag=$sqlHelper->execute_dml($sql);
		
		$o_id=$sqlHelper->getLastId();
		$order->setO_id($o_id);
		
		$sqlHelper->close_connect();
		
		return $flag;
	}
	
	
	//从数据库中按照用户id取得所有的订单
	public function getAllOrder($order){
		//$order=new Order();
		$o_user_id=$order->getO_user_id();
		
		$sql="select * from w_order where o_user_id=$o_user_id";
		
// 		echo $sql;
// 		exit();
		
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		$sqlHelper->close_connect();
		
		$order->setI_arr($res);
	}
}

?>