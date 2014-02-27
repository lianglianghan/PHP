<?php


		//绘制验证码
		$checkCode="";
		for ($i=0;$i<4;$i++){
			$checkCode.=dechex(rand(1, 15));
		}
		
		//将验证码存入session中
		session_start();
		$_SESSION['checkCode']=$checkCode;
		
		$img=imagecreatetruecolor(120, 30);
		$white=imagecolorallocate($img, 255, 255, 255);
		//填充画布的颜色
		//imagefill($img, 0, 0, $white);
		
		$red=imagecolorallocate($img, 255, 255, 255);
		
		//画出背景干扰线
		for ($i=0;$i<20;$i++){
			imageline($img, rand(0, 120), rand(0, 30), rand(0, 120), rand(0, 30), imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255)));
		}
		
		//画出验证码
		imagestring($img, rand(2, 5), rand(0, 90), rand(0,15), $checkCode, $red);
		
		//输出
		header("content-type:image/png");
		imagepng($img);
		imagedestroy($img);
		
	
?>