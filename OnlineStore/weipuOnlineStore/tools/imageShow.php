<?php
require_once dirname ( __FILE__ ) . '/' . '../classes/Common.class.php';

/**
 * 用来负责图片的动态输出
 */

// echo $_REQUEST['id'];
// exit();

// echo $id;
// echo $_GET['id'];
// exit();

// $path = $_SERVER ['DOCUMENT_ROOT'] . Common::$uploadPath . '1' . "/" . '1393144069991.jpg';
$path = $_SERVER ['DOCUMENT_ROOT'] . Common::$uploadPath . $_GET ['id'] . "/" . $_GET ['name'];

// $img=imagecreatefromjpeg($path);

// imagejpeg($img);

$name = $_GET ['name'];
$type = substr ( $name, strrpos ( $name, "." ) + 1 );

//读取文件内容
$fp = fopen ( $path, "r" );
$content = "";
$buffer = 1024;
while ( ! feof ( $fp ) ) {
	$content .= fread ( $fp, $buffer );
}
fclose ( $fp );

$content_type = "";

//判断输出类型
switch ($type) {
	case 'jpg' :
		$content_type = "image/jpeg";
		break;
	case 'png' :
		$content_type = "image/png";
		break;
	case 'gif' :
		$content_type = "image/gif";
		break;
	case 'bmp' :
		$content_type = "image/bmp";
		break;
}

//输出
header ( "content-type:$content_type" );
echo $content;

// imagedestroy($img);

?>