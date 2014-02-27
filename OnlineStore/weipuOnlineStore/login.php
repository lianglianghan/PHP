<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆微铺</title>
<link href="./templates/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#F2F2F2">
	<div class="logo">
		<img src="./templates/images/logo.png" style="float: left;" /> <span
			style="font-size: 25px; height: 80px; line-height: 60px; margin-left: -25px;">欢迎登陆</span>
	</div>

	<div class="w">

		<div class="picture">
			<img src="./templates/images/login_picture.png" />
		</div>

		<div class="s">
			<form action="./loginProcess.php?flag=1" method="post">
				<table style="margin-top: 100px; margin-left: 70px;">
					<tr>
						<td style="font-size: 20px;">Email&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="email"
							style="height: 25px; width: 220px;"
							value="<?php if(!empty($_COOKIE['u_email'])){echo $_COOKIE['u_email'];}else{echo "";}?>" /></td>
					</tr>
					<tr>
						<td style="font-size: 20px; line-height: 60px;">密码</td>
						<td><input type="password" name="password"
							style="height: 25px; width: 220px;" /></td>
					</tr>



				</table>

				<div style="height: 40px; margin-top: 3px; width: 445px;">
					<font style="margin-left: 72px; font-size: 20px; margin-top: 0px;">验证码
					</font> <input type="text" name="checkCode"
						style="height: 25px; width: 100px; margin-left: 26px; margin-top: 5px; position: absolute;" />
					<img src="./tools/checkCode.php"
						style="margin-left: 150px; margin-top: 5px;"
						onclick="this.src='./tools/checkCode.php?aa='+Math.random()" />
				</div>


				<div>
					<input type="submit" value="提交登录"
						style="width: 100px; height: 40px; background-color: #EE4C4F; color: white; margin-top: 25px; margin-left: 130px;" />
					<input type="reset" value="重新填写"
						style="width: 100px; height: 40px; background-color: #EE4C4F; color: white; margin-top: 25px; margin-left: 30px;" />
				</div>
			</form>

			<span style="margin-left: 100px;"><?php
			if (! empty ( $_GET ['errno'] )) {
				$errno = $_GET ['errno'];
				if ($errno == 1) {
					echo "<font color='red' >邮箱或者密码错误</font>";
				} else if ($errno == 2) {
					echo "<font color='red'>验证码错误</font>";
				}
			}
			?></span>
		</div>
	</div>
	<div class="register">
		<a href="./register.php" style="text-decoration: none; color: white;">免费注册>>></a>
	</div>
</body>
</html>
