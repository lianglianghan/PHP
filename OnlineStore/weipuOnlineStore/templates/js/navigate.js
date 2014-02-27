//商品搜索
function search() {
	// window.alert("test");
	var search_form = $('search_form');
	// window.alert(search_form);
	var item_key = $('item_key');
	var key = item_key.value;
	// window.alert(key);
	if (key.trim() == "") {
		item_key.value = "";
	}
	search_form.action = "./listItem.php";
	search_form.method = "post";
	search_form.submit();
	// window.alert("test");
}

//登录后当鼠标放到昵称上后，显示下拉菜单
function showManage(obj) {
	var manage = $("manage");
	//window.alert("test");
	manage.style.top="40px";
	manage.style.display = "block";
	
}

//登录后当鼠标放从昵称上移开后，隐藏下拉菜单
function hideManage(obj) {
	var manage = $("manage");
	manage.style.display = "none";
}

// 通过id号获得obj对象
function $(id) {
	return document.getElementById(id);
}