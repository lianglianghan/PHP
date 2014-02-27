<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>登录</title>
</head>
<body>
	<h1>登录</h1>
	<form action="loginProcess.php" method="post">
		<table>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password" /></td>

			</tr>
			<tr>
				<td>请输入验证码</td>
				<td><input type="text" name="checkCode" /><img
					src="./tools/checkCode.php"
					onclick="this.src='./tools/checkCode.php?aa='+Math.random()" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交登录" /></td>
				<td><input type="reset" value="重新填写" /></td>
			</tr>



		</table>
	</form>
	<?php
	if (! empty ( $_GET ['errno'] )) {
		$errno = $_GET ['errno'];
		if ($errno == 1) {
			echo "<font color='red'>邮箱或者密码错误</font>";
		} else if ($errno == 2) {
			echo "<font color='red'>验证码错误</font>";
		}
	}
	?>
</body>

</html>