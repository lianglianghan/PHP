<?php

	//echo "./templates/images/store_logo_default.gif";
	$filename="../templates/images/store_logo_default.gif";
	$arr=getimagesize($filename);
	//print_r($arr);
	$width=$arr[0];
	$height=$arr[1];
	$img=imagecreatetruecolor($width, $height);
	
	$srcImg=imagecreatefromgif($filename);
	
	imagecopy($img, $srcImg, 0, 0, 0, 0, $width, $height);
	
	header("content-type:image/png");
	
	imagepng($img);
	
	imagedestroy($img);
	
?>