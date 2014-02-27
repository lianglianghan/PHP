//判断是否登录通过隐藏的控件来判断
function isLogin() {
	// window.alert("test");
	// 获得隐藏的属性
	var u_id = $('u_id');
	var form1 = $('form1');
	
	//document.write(u_id.value);
	
	//window.alert(u_id.value);

	 if(u_id.value=="noid"){
		//window.alert("登录");
		openLogin();
		// window.alert(flag);
		// if (flag) {
		// form1.action = "./order.php";
		// form1.method = "post";
		// form1.submit();
		// }

	}else if (u_id.value!="noid") {
		//window.alert("提交");
		form1.action = "./order.php";
		form1.method = "post";
		form1.submit();
	} 
}

// 测试
function test() {
	var email = $('email');
	var password = $('password');
	window.alert("email--->>>" + email.value + "-->>pwd" + password.value);
}

// 通过id号得到对象
function $(id) {
	return document.getElementById(id);
}

// 打开登录对话框
function openLogin() {
	document.getElementById("login_dialog").style.display = "";
}

// 关闭登录对话框
function closeLogin() {
	document.getElementById("login_dialog").style.display = "none";
}

// 验证用户的合法性
function check() {
	var email = $('email');
	var password = $('password');
	checkUser(email.value, password.value);

}

// 通过ajax技术来验证用户的合法性
function checkUser(email, password) {

	//var flag = false;

	// window.alert(email+"--"+password);
	// 创建XMLHttpRequest对象
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		// 现代浏览器
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5 用户低版本ie
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	/*
	 * window.alert("../loginProcess.php?flag=2" + "\&email=" + email +
	 * "\&password=" + password);
	 */

	// 向服务器的loginProcess.php发送异步请求来验证用户的合法性
	xmlhttp.open("GET", "./loginProcess.php?flag=2" + "\&email=" + email
			+ "\&password=" + password, true);
	// 将请求发送至服务器
	xmlhttp.send();
	// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务
	// 通过onreadystatechange的事件来对返回的数据进行相应的处理
	xmlhttp.onreadystatechange = function() {
		// 4--服务器处理完成并返回 200---对应的为http响应代码（正常的情况)
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			// document.getElementById("txtHint").innerHTML =
			// xmlhttp.responseText;
			var res = xmlhttp.responseText;
			// window.alert(res);
			if (res == "true") {
				//window.alert("登录成功");
				//flag = true;

				// 关闭登录对话框
				closeLogin();

				// 提交数据到order界面
				var form1 = $('form1');
				form1.action = "./order.php";
				form1.method = "post";
				form1.submit();

				// return flag;
			} else if (res == "false") {
				//window.alert("登录失败");
				// 在登录对话框上显示登录失败
				var errorMessage = $('errorMessage');
				errorMessage.innerHTML = "<font color='red'>用户名或者密码错误</font>";
				//return flag;
			}
		}
	}

}