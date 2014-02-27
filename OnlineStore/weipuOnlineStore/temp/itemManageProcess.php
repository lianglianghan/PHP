<?php
require_once dirname ( __FILE__ ) . '/' . './classes/Common.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Picture.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/PictureService.class.php';

header("content-type:text/html;charset=utf-8");

// 1.接收上传文件的用户id
$userid = $_POST ['userid'];
$itemid=$_POST['itemid'];

// echo $username." ".$fileintro;

// 我们这里需要使用到S_FILE;

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

// 获取文件的大小
$file_size = $_FILES ['myfile'] ['size'];
if ($file_size > 2 * 1024 * 1024) {
	echo "文件过大，不能上传大于2M的文件";
	exit ();
}

// 获取文件的类型
$file_type = $_FILES ['myfile'] ['type'];
if ($file_type != 'image/jpeg' && $file_type != 'imgage/pjepg') {
	echo "文件类型只能是jpg的";
	exit ();
}

// 判断上传是否成功

if (is_uploaded_file ( $_FILES ['myfile'] ['tmp_name'] )) {
	// 把这个文件转存到你希望的目录
	$uploaded_file = $_FILES ['myfile'] ['tmp_name'];
	
	// 我们给每个用户动态的创建一个文件夹
	$user_path = $_SERVER ['DOCUMENT_ROOT'] . Common::$uploadPath . $userid;
	
	// $user_path=iconv("utf-8","gb2312",$user_path);
	
	// 判断该用户是否已经有文件夹
	if (! file_exists ( $user_path )) {
		mkdir ( iconv ( "utf-8", "gb2312", $user_path ) );
	}
	
	// $move_to_file=$user_path."/".$_FILES['myfile']['name'];
	
	// $file_type=$_FILES['myfile']['name']
	$file_true_name = $file_type = $_FILES ['myfile'] ['name'];
	
	$file_true_type = substr ( $file_true_name, strrpos ( $file_true_name, "." ) );
	$file_final_name = "" . time () . rand ( 1, 1000 ) . $file_true_type;
	$move_to_file = $user_path . "/" . $file_final_name;
	
	// echo $move_to_file;
	// echo "<br/>$uploaded_file";
	// exit();
	
	// echo $uploaded_file."||".$move_to_file;
	if (move_uploaded_file ( $uploaded_file, iconv ( "utf-8", "gb2312", $move_to_file ) )) {
		// 将上传的信息保存到数据库中
		$picture = new Picture ();
		//注意此处的id应该为商品的id
		$picture->setP_id ($itemid);
		$picture->setP_path ( $file_final_name );
		$pictureService = new PictureService ();
		$flag=$pictureService->addPicture ( $picture );
		if($flag==1){
			echo "上传ok";
		}
		
	} else {
		echo "上传失败";
	}
} else {
	echo "上传失败";
}

?>