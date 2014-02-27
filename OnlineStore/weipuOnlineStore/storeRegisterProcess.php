<?php
require_once dirname ( __FILE__ ) . '/' . './classes/User.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Common.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Store.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/StoreService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Upload.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UploadService.class.php';

header ( "content-type:text/html;charset=utf-8" );
session_start ();

$userService = new UserService ();
$user = new User ();
$user->setU_email ( $_SESSION ['u_email'] );
$user->setU_isowner ( '1' );
$flag = $userService->setOwner ( $user );

// echo $user->getU_isowner();
// exit();

if ($flag == 1) {
	// 在upload文件夹下为用户创建文件夹,名称为用户邮箱
	// $user_path=$_SERVER['DOCUMENT_ROOT'].'/weipuOnlineStore/upload/'.$user->getU_email();
	$user_path = $_SERVER ['DOCUMENT_ROOT'] . Common::$uploadPath . $user->getU_id ();
	// echo $user_path;
	// echo "<br/>".$user->getU_id();
	// 判断是否为店主
	if ($user->getU_isowner () == '1') {
		// echo $user_path;
		// 创建文件夹
		if (! file_exists ( $user_path )) {
			mkdir ( $user_path );
		}
	} else {
	}
} else {
	echo "你已注册";
	exit ();
}

$upload = new Upload ();
$upload->setFile ( $_FILES ['s_picture'] );
$upload->setUserid ( $user->getU_id () );

$uploadService = new UploadService ();
$uploadService->upload ( $upload );

$store = new Store ();
$store->setS_user_id ( $user->getU_id () );
$store->setS_name ( $_POST ['s_name'] );
$store->setS_introduce ( $_POST ['s_introduce'] );
if ($upload->getFlag ()) {
	$store->setS_picture ( $upload->getFile_final_name () );
}

$storeService = new StoreService ();
$flag = $storeService->initStore ( $store );

if ($flag == 1) {
	echo "注册店铺成功<br/>";
	// 跳转到商品管理界面
	echo "<a href='./index.php'>返回主页面</a><br/>";
	echo "<a href='./itemManage.php'>商品管理</a><br/>";
} else {
	echo "注册失败<br/>";
	// 跳转到其他界面
	echo "<a href='./index.php'>点击返回主页面</a><br/>";
}

// echo $flag;

?>