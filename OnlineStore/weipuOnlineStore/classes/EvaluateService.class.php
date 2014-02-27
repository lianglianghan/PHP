<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';

	class EvaluateService{
		
		public function addEvaluate($evaluate){
			//$evaluate=new Evaluate();
			$e_order_id=$evaluate->getE_order_id();
			$e_user_id=$evaluate->getE_user_id();
			$e_date=$evaluate->getE_date();
			$e_info=$evaluate->getE_info();
			
			$sql="insert into w_evaluate (e_order_id,e_user_id,e_date,e_info) values ($e_order_id,$e_user_id,'$e_date','$e_info')";
			
// 			echo $sql;
			
// 			exit();

			$sqlHelper=new SqlHelper();
			$flag=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			
			return $flag;
			
		}
		
	}

?>