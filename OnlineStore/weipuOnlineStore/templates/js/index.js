var myImg = $("myPic");
var myImgArray = new Array("1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg");
var path = "./templates/images/";
var i = 0;

//商品搜索
function search(){
	//window.alert("test");
	var search_form=$('search_form');
	//window.alert(search_form);
	var item_key=$('item_key');
	var key=item_key.value;
	//window.alert(key);
	if(key.trim()==""){
		item_key.value="";
	}
	search_form.action="./listItem.php";
	search_form.method="post";
	search_form.submit();
	//window.alert("test");
}

// 图片轮播
function picSwitch() {
	// window.alert(myImgArray.length);
	if (i == myImgArray.length - 1) {
		i = 0;
	} else {
		i++;
	}
	myImg.src = path + myImgArray[i];
	// window.alert(myImgArray[i]);

}

// 当鼠标移到图片上，显示导航条(left right)
function showNavigator() {
	var left = $("left");
	var right = $("right");
	// window.alert(left);
	left.style.display = "block";
	right.style.display = "block";
}
// 当鼠标从图片上移开后，隐藏导航条
function hideNavigator() {
	var left = $("left");
	var right = $("right");
	// window.alert(left);
	left.style.display = "none";
	right.style.display = "none";
}

// 加深图片
function darked(obj) {
	if (obj.id == "left") {
		obj.src = path + "left1.png";
	} else if (obj.id == "right") {
		obj.src = path + "right1.png";
	}
}

// 减淡图片
function light(obj) {
	if (obj.id == "left") {
		obj.src = path + "left.png";
	} else if (obj.id == "right") {
		obj.src = path + "right.png";
	}
}

// 显示上一张图片
function showLast() {
	i--;
	if (i == -1) {
		i = myImgArray.length - 1;
	}
	myImg.src = path + myImgArray[i];
}

// 显示下一张图片
function showNext() {
	i++;
	if (i == myImgArray.length) {
		i = 0;
	}
	myImg.src = path + myImgArray[i];
}

function $(id) {
	return document.getElementById(id);
}

setInterval("picSwitch()", 5000);

// 用于更换下方的信息（店家、热销商品等）
function update(obj) {
	// 获取各个对象
	var shop = $("shop");
	var hot = $("hot");
	var huasuan = $("tuangou");
	// window.alert(huasuan);
	var miaosha = $("miaosha");
	var huangou = $("huangou");
	// 首先将各个都设置为隐藏
	shop.style.display = "none";
	hot.style.display = "none";
	huasuan.style.display = "none";
	miaosha.style.display = "none";
	huangou.style.display = "none";
	// obj.style.backgroundColor="#E12B36";
	switch (obj.id) {
	case "shop_label":
		shop.style.display = "block";

		break;
	case "hot_label":
		// window.alert("hot");
		hot.style.display = "block";
		break;
	case "tuangou_label":
		huasuan.style.display = "block";
		break;
	case "miaosha_label":
		miaosha.style.display = "block";
		break;
	case "huangou_label":
		huangou.style.display = "block";
		break;
	}
}

// 登录后当鼠标放到昵称上后，显示下拉菜单
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

