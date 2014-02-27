<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="./templates/css/register.css" type="text/css"
	rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册</title>
</head>

<body bgcolor="#F2F2F2">
	<!--  <div class="daohang">
		<div class="save">
			<img src="./templates/images/save.png" />收藏微铺
		</div>
        <div class="welcome">您好！欢迎来到微铺！</div>
	</div>-->
	<div class="logo">
		<img src="./templates/images/logo.png" /><img
			src="./templates/images/zhuce.png"
			style="margin-left: -50px; margin-top: -10px;" />
	</div>
	<form action="registerProcess.php" method="post">
		<div class="zhuce">
			<div class="picture_shouji">
				<img src="./templates/images/shouji.png"
					style="height: 200px; width: 220px;" />
			</div>
			<div class="xinxi">

				<div class="p1">
					<a style="font-size: 20px; ">&nbsp;&nbsp;邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:</a>
					<input type="text" name="email" style="width: 200px; height: 28px;" />
				</div>

				<br /> <br />

				<div class="p2">
					<a style="font-size: 20px; ">&nbsp;&nbsp;昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:</a>
					<input type="text" name="nickname"
						style="width: 200px; height: 28px;" />
				</div>
				<br /> <br />

				<div class="p3">
					<a style="font-size: 20px; line-height: 50px; ">&nbsp;&nbsp;请设置密码:</a>
					<input type="password" name="password"
						style="width: 200px; height: 28px;" />
				</div>


				<br /> <br />

				<div class="p4">
					<a style="font-size: 20px; line-height: 50px; ">&nbsp;&nbsp;请确认密码:</a>
					<input type="password" name="password1"
						style="width: 200px; height: 28px;" />
				</div>


				<br /> <br />

				<div class="p5">
					<div style="float: left;">
						<a style="font-size: 20px; ">请输入验证码:</a> <input
							type="text" name="checkCode" style="width: 100px; height: 28px;" />

					</div>
					<div style="float: left; margin-left: 20px;">
						<img src="./tools/checkCode.php"
							onclick="this.src='./tools/checkCode.php?aa='+Math.random()" />
					</div>

				</div>



				<div style="left:120px;position: absolute;top: 400px;">
					<input type="submit" value="立即注册"
						style="width: 200px; height: 40px; background-color: #E33D3F; color: white;" />
				</div>


			</div>



			<div style="margin-top: 390px; margin-left: 200px;">
		<?php
		if (! empty ( $_GET ['errno'] )) {
			$errno = $_GET ['errno'];
			// echo $errno;
			if ($errno == 3) {
				// echo "进来了";
				echo "<font color='red'>验证码错误</font>";
			} else if ($errno == 1) {
				echo "<font color='red'>两次密码不匹配</font>";
			} else if ($errno == 2) {
				echo "<font color='red'>邮箱已存在</font>";
			}
		}
		
		?>
	</div>
		</div>
	</form>
</body>
</html>
