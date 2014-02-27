//提交订单后后台

function commit() {

	
	var order_detail_form = $('order_detail_form');
	var a_name = $('a_name');
	var a_mobile = $('a_mobile');
	var a_address = $('a_address');

	var a_name_value = a_name.value.trim();
	var a_mobile_value = a_mobile.value.trim();
	var a_address_value = a_address.value.trim();

	if (a_name_value != "" && a_mobile_value != "" && a_address_value != "") {
		
		order_detail_form.action = "./orderProcess.php";
		order_detail_form.method = "post";
		// 数据提交
		order_detail_form.submit();
		
	} else {
		// 在界面上提示请输入收货信息
		var errorMessage = $('errorMessage');
		errorMessage.innerHTML = "<font color='red'>请填写完整的用户信息</font>";
	}
}

// 通过id号得到对象
function $(id) {
	return document.getElementById(id);
}