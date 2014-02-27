<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';
class ItemService {
	// 增加所有商品
	public function addItem($item) {
		// $item = new Item ();
		$i_name = $item->getI_name ();
		$i_price = $item->getI_price ();
		$i_nums = $item->getI_nums ();
		$i_province = $item->getI_province ();
		$i_store_id = $item->getI_store_id ();
		$i_category = $item->getI_category ();
		$i_introduce = $item->getI_introduce ();
		$i_picture = $item->getI_picture ();
		
		$sql = "insert into w_item (i_name,i_price,i_nums,i_province,i_store_id,i_category,i_introduce,i_picture) values ('$i_name',$i_price,$i_nums,'$i_province',$i_store_id,'$i_category','$i_introduce','$i_picture')";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		// 获取上面插入的行号
		// $sql="select last_insert_id()";
		
		// if($flag==1)
		
		$sqlHelper->close_connect ();
		
		return $flag;
	}
	
	//取得商品图片信息
	public function getItemPic($item){
		//$item=new Item();
		$i_id=$item->getI_id();
		
		
		$sql="select i_picture,i_name from w_item where i_id=$i_id";
		
// 		echo $sql;
// 		exit();

		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		$sqlHelper->close_connect();
		
		$item->setI_picture($res[0][0]);
		$item->setI_name($res[0][1]);
		
	}
	
	
	// 取得商品的id编号
	public function getItemId($item) {
		// $item=new Item();
		$i_picture = $item->getI_picture ();
		
		// 其中的商品id号都是唯一的是通过time()函数拼上rand(1,1000);
		
		$sql = "select i_id from w_item where i_picture='$i_picture'";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		$sqlHelper->close_connect ();
		
		$item->setI_id ( $res [0] [0] );
	}
	
	// 取得商品的详细信息
	public function getItemInfo($item) {
		// $item=new Item();
		$i_picture = $item->getI_picture ();
		
		$sql = "select * from w_item where i_picture='$i_picture'";
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		$sqlHelper->close_connect ();
		
		$item->setI_id ( $res [0] ['i_id'] );
		$item->setI_name ( $res [0] ['i_name'] );
		$item->setI_nums ( $res [0] ['i_nums'] );
		$item->setI_introduce ( $res [0] ['i_introduce'] );
		$item->setI_price ( $res [0] ['i_price'] );
		$item->setI_province ( $res [0] ['i_province'] );
		$item->setI_category ( $res [0] ['i_category'] );
		$item->setI_store_id ( $res [0] ['i_store_id'] );
	}
	
	// 取得所有商品
	public function getAllItemInfo($item) {
		// $item=new Item();
		$sql = "select * from w_item";
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		
		$sqlHelper->close_connect ();
		// $count=count($res);
		// $arr=array();
		// for($i=0;$i<$count;$i++){
		// $arr
		// }
		
		// print_r($res);
		// exit();
		
		$item->setI_arr ( $res );
	}
	
	// 按照指定的名字搜索出指定商品
	public function searchItem($item) {
		//$item = new Item ();
		// 这里的搜索做的比较简单,需要加上分页
		$key = $item->getKey ();
		
		$sql = "select * from w_item where i_name like '%$key%'";
// 		echo $sql;
// 		exit();
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		
		//print_r($res);
		
		$sqlHelper->close_connect ();
		
		// 将搜索的结果填入集合中
		$item->setI_arr ( $res );
	}
}

?>