<?php
require_once dirname ( __FILE__ ) . '/' . './classes/Common.class.php';

require_once dirname ( __FILE__ ) . '/' . './classes/Upload.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UploadService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Item.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/ItemService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Picture.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/PictureService.class.php';

session_start ();

if (empty ( $_SESSION ['u_id'] )) {
	exit ();
}

// echo $_POST['pic'];
// exit();
$item = new Item ();
$itemService = new ItemService ();
if (! empty ( $_POST ['pic'] )) {
	$item->setI_picture ( $_POST ['pic'] );
	$itemService->getItemId ( $item );
	// echo $item->getI_id();
	// exit();
} else {
	echo "请先添加商品";
	exit ();
}

// print_r($_FILES);
$arr = array ();
for($i = 1; $i <= 5; $i ++) {
	$file_name = "picture" . $i;
	if ($_FILES [$file_name] ['size'] > 0) {
		// echo $i."<br/>";
		
		$upload = new Upload ();
		$upload->setFile ( $_FILES [$file_name] );
		$upload->setUserid ( $_SESSION ['u_id'] );
		
		$uploadService = new UploadService ();
		$uploadService->upload ( $upload );
		
		$picture = new Picture ();
		$pictureService = new PictureService ();
		$picture->setP_id ( $item->getI_id () );
		$picture->setP_path ( $upload->getFile_final_name () );
		$flag = $pictureService->addPicture ( $picture );
		$arr [] = $flag;
		// if($flag==1){
		// echo "添加成功";
		// //成功后跳转到商品详情界面
		// }else{
		// echo "添加失败";
		// //接下来进行调转
		// }
	}
}

$upload_is_ok = true;
foreach ( $arr as $key => $val ) {
	if ($val == false) {
		$upload_is_ok = false;
	}
}

if ($upload_is_ok) {
	echo "添加成功";
	// 成功后跳转到商品详情界面
	// header("Location:./item.php?item_logo={$item->getI_picture()}");
	// 返回主页
	echo "<a href='./index.php'>返回主页</a><br/>";
	echo "<a href='./item.php?item_logo={$item->getI_picture()}'>预览商品</a><br/>";
} else {
	echo "添加失败";
	// 接下来进行调转
}

?>