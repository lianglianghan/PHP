<?php
require_once dirname ( __FILE__ ) . '/' . '../classes/Common.class.php';

//echo $_REQUEST['id'];
//exit();

//echo $id;
//echo $_GET['id'];
//exit();

//$path = $_SERVER ['DOCUMENT_ROOT'] . Common::$uploadPath . '1' . "/" . '1393144069991.jpg';
$path = $_SERVER ['DOCUMENT_ROOT'] . Common::$uploadPath . $_GET['id'] . "/" . $_GET['name'];


//$img=imagecreatefromjpeg($path);


//imagejpeg($img);

$fp=fopen($path, "r");
$content="";
$buffer=1024;
while(!feof($fp)){
	$content.=fread($fp, $buffer);
}
fclose($fp);

header("content-type:image/jpeg");
echo $content;

//imagedestroy($img);

?>