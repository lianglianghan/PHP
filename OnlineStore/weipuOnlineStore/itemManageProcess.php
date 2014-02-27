<?php
require_once dirname ( __FILE__ ) . '/' . './classes/User.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Common.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Store.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/StoreService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Upload.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UploadService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Item.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/ItemService.class.php';

session_start ();

header ( "content-type:text/html;charset=utf-8" );
if (! empty ( $_SESSION ['u_id'] )) {
	$store = new Store ();
	$store->setS_user_id ( $_SESSION ['u_id'] );
	// echo $_SESSION['u_id'];
	$storeService = new StoreService ();
	$storeService->getStoreId ( $store );
	// echo $store->getS_id();
	
	$item = new Item ();
	$item->setI_name ( $_POST ['i_name'] );
	$item->setI_nums ( $_POST ['i_nums'] );
	$item->setI_store_id ( $store->getS_id () );
	$item->setI_price ( $_POST ['i_price'] );
	$item->setI_province ( $_POST ['i_province'] );
	$item->setI_category ( $_POST ['i_category'] );
	$item->setI_introduce($_POST['i_introduce']);
	
	//上传
	$upload = new Upload ();
	$upload->setFile ( $_FILES ['i_picture'] );
	$upload->setUserid ( $_SESSION ['u_id'] );
	
	$uploadService = new UploadService ();
	$uploadService->upload ( $upload );
	
	if ($upload->getFlag ()) {
		$item->setI_picture($upload->getFile_final_name());
	}else{
		
		exit();
	}
	
	$itemService=new ItemService();
	$itemService->addItem($item);
	
	$pic=$item->getI_picture();
	
	header("Location:./itemDetailManage.php?pic=$pic");
	
	//print_r($item);
} else {
	echo "请先登录";
	exit();
}

?>