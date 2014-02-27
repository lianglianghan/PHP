<html>
<head>
<?php header("content-type:text/html;charset=utf-8");?>
<title>登录测试</title>

</head>
<body>
	<div id="login_dialog"
		style="display: none; POSITION: absolute; left: 50%; top: 50%; width: 600px; height: 400px; margin-left: -300px; margin-top: -200px; border: 1px solid #888; background-color: #edf; text-align: center">
		这是DIV登录框示例<br />
		<!--  <a href="javascript:closeLogin();">关闭登录框</a>-->
		<!--  <form action="">-->
		<div
			style="background-color: pink; margin-left: 30px; width: 300px; height: 300px;">
			<table>
				<tr>
					<td>邮箱</td>
					<td><input type="text" name="email" id="email" /></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="password" name="password" id="password" /></td>
				</tr>
				<tr>
					<td><input type="button" value="提交登录" onclick="check()" /></td>
					<td><input type="reset" value="重新填写" /></td>
				</tr>

			</table>
			<div style="background-color: transparent; color: white;" id="errorMessage"></div>
		</div>
		<!--  </form>-->
	</div>
	<a href="javascript:openLogin();">打开登录框</a>
	<script src="./ajax.js"></script>
</body>
</html>