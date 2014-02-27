<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';

// 图片的信息还有一定的问题
class PictureService {
	
	// 为商品增加详细的信息
	public function addPicture($picture) {
		// $picture=new Picture();
		// 这里的pid指的是商品的id编号
		$p_id = $picture->getP_id ();
		$p_path = $picture->getP_path ();
		
		$sql = "insert into w_picture (p_id,p_path) values ($p_id,'$p_path')";
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		$sqlHelper->close_connect ();
		
		return $flag;
	}
	
	// 从数据库中取得商品的图片信息
	public function getPictureInfo($picture) {
		//$picture = new Picture ();
		$p_id = $picture->getP_id ();
		
		$sql = "select p_path from w_picture where p_id=$p_id";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		$sqlHelper->close_connect ();
		
		// 注意此处存的为数组
		$picture->setP_path ( $res );
	}
}

?>