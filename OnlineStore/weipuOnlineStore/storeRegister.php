<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once dirname ( __FILE__ ) . '/' . './classes/User.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';
session_start ();

//$user=new User();
$userService=new UserService();
//$user->setU_id($_SESSION['u_id']);
$flag=$userService->isOwner($_SESSION['u_id']);
if($flag){
	echo "抱歉，您已注册店铺，不能重复注册";
	exit();
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册商铺</title>
<link href="./templates/css/store.css" type="text/css" rel="stylesheet" />
<!--  <style type="text/css">
#picshow {
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale);
	width: 88px;
	height: 125px;
}
</style>
<script type="text/javascript" language="javascript">   
 
function upimg(imgFile)   
{    
     var picshow = document.getElementById("picshow");
      
     picshow.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgFile.value;   
     picshow.style.width = "100px";   
     picshow.style.height = "100px";   
}   
 
</script>-->

<!-- 图片上传预览需要的jQuery代码 -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
	type="text/javascript"></script>
<script src="./templates/js/uploadPreview.js" type="text/javascript"></script>
<script>
        $(function () {
            $("#up").uploadPreview({ Img: "ImgPr", Width: 120, Height: 120 });
        });
    </script>
</head>

<body bgcolor="#F2F2F2">

	<!--  <div class="daohang">
		<div class="save">
			<img src="./templates/images/save.png" />收藏微铺
		</div>
		<div class="kefu">[客服服务]</div>
		<div class="dingdan">[我的订单]</div>
		<div class="welcome">您好！欢迎来到微铺！</div>


	</div>-->
	<div class="logo">
		<img src="./templates/images/logo.png" /><img
			src="./templates/images/zhuce.png" style="margin-left: -50px;" />
	</div>
	<form enctype="multipart/form-data" action="./storeRegisterProcess.php"
		method="post">
		<div class="dianpu">
			<div class="touxiang">
				<!--  <div id="picshow"
					style="border: 1px solid silver; width: 100px; height: 100px; margin-bottom: 3px;"></div>
				选择图片：<input type="file" name="s_picture" size="20"
					onchange="upimg(this);" />-->
				<div>
					<img id="ImgPr" width="120" height="120" />
				</div>
				<input type="file" id="up" name="s_picture" />
			</div>

			<table style="float: left; margin-left: 50px; margin-top: 50px;">
				<tr>
					<td style="font-size: 30px; color: #999999; line-height: 50px;">店铺名称:</td>
					<td><input type="text" style="width: 100px; height: 25px;"
						name="s_name" /></td>
				</tr>
				<tr>
					<td style="font-size: 30px; color: #999999; line-height: 50px;">经营范围:</td>
					<td><textarea rows="3" cols="40"></textarea></td>
				</tr>
				<tr>
					<td style="font-size: 30px; color: #999999; line-height: 50px;">店铺简介：</td>
					<td><textarea rows="10" cols="60" name="s_introduce"></textarea></td>
				</tr>
			</table>

			<div class="submit">
				<input type="submit" value="立即注册"
					style="width: 200px; height: 50px; background-color: #E33D3F; color: white;" />
			</div>

		</div>
	</form>

</body>
</html>
