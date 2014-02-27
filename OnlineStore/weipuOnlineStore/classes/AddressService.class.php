<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';

class AddressService {
	public function addAddress($address) {
		// $address=new Address();
		$a_id = $address->getA_id ();
		$a_name = $address->getA_name ();
		$a_mobile = $address->getA_mobile ();
		$a_address = $address->getA_address ();
		
		$sql = "insert into w_address (a_id,a_name,a_mobile,a_address) values ($a_id,'$a_name','$a_mobile','$a_address')";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		$sqlHelper->close_connect ();
		
		return $flag;
	}
}

?>