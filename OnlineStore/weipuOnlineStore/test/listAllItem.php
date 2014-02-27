<?php
require_once dirname ( __FILE__ ) . '/' . '../classes/Item.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/ItemService.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/Picture.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/PictureService.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/User.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/UserService.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/Store.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/StoreService.class.php';
require_once dirname ( __FILE__ ) . '/' . '../classes/Common.class.php';

// 商品数组
// $itemArr=array();
$item = new Item ();
$itemService = new ItemService ();

$store = new Store ();
$storeService = new StoreService ();

// 取得所有商品
$itemService->getAllItemInfo ( $item );
$arr = $item->getI_arr ();
$count = count ( $arr );
// echo $count;
// exit();
for($i = 0; $i < $count; $i ++) {
	$i_sore_id = $arr [$i] ['i_store_id'];
	$i_picture = $arr [$i] ['i_picture'];
	$store->setS_id ( $i_sore_id );
	$storeService->getOwnerId ( $store );
	// echo $store->getS_user_id()."<br/>";
	// echo $i_picture;
	echo "<a href='../item.php?item_logo={$i_picture}'><img src='../tools/imageShow.php?id={$store->getS_user_id()}&name={$i_picture}' style='width:200px; height:200px;margin-left:20px;float:left;'/></a>";
}

?>