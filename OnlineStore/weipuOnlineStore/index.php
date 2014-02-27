<?php
session_start ();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微铺</title>
<link href="./templates/css/index.css" rel="stylesheet" type="text/css" />
<link href="./templates/css/index_pic.css" rel="stylesheet"
	type="text/css" />
</head>


<body>

	<div class="navigate" id="myNavigate">
		<!--logo部分-->
		<div class="logo">
			<!--  <br />&nbsp;&nbsp;&nbsp;&nbsp;logo-->
			<!--<img src="images/logo.png"/>-->
			<img src="./templates/images/logo_small.png" />
		</div>
		<!--搜索-->
		<div class="search">
			<span class="treasure">搜宝贝</span><span
				style="float: left; width: 10px; height: 44px; background-color: white; margin-top: 3px;"></span>
			<form action="./listItem.php" method="post" id="search_form">
				<input type="text" class="input" id="item_key" name="item_key"
					style="font-size: 30px;" /> <span class="mysearch"
					onclick="search()" style="cursor: pointer;">搜索</span>
			</form>
		</div>
		<!--登录-->
		<div class="login">
			<span><?php
			
			if (! empty ( $_SESSION ['u_nickname'] )) {
				echo "<a href='#' style='text-decoration: none; color:#D41420;' onmouseover='showManage()' >欢迎您,{$_SESSION ['u_nickname']}</a>";
				// echo "<div style='width:'><a href='#'>我要开店</a><br/><a href='#'>退出</a><a href='#'></a></div>";
			} else {
				echo "<a href='./login.php' style='text-decoration: none; color:#F22E00;'>亲，请登陆</a>";
			}
			?></span>

		</div>
		<div class="register">
			<span><?php
			
			if (! empty ( $_SESSION ['u_nickname'] )) {
				echo "<a><a>";
			} else {
				echo "<a href='./register.php' style='text-decoration: none;color: #6C6C6C; '>免费注册</a>";
			}
			?>
			</span>
		</div>
		<div id="manage" class="manage" onmouseover="showManage()"
			onmouseout="hideManage()">
			<br/><a href="./storeRegister.php">&nbsp;&nbsp;我要开店</a><br /> <a
				href="./itemManage.php">&nbsp;&nbsp;商品管理</a><br /> <a href="./myorder.php">&nbsp;&nbsp;我的订单</a><br />
			<a href="./logout.php">&nbsp;&nbsp;注销退出</a>
		</div>
		<!--客服-->
		<div class="assistant">
			<span >在线客服</span>
		</div>
	</div>

	<!--下方的物品展示-->
	<div class="info">
		<!--商品分类-->
		<div class="category">
			<div class="label">此处为分类的标签</div>
			<div class="myimgs" onmouseover="showNavigator()"
				onmouseout="hideNavigator()">
				<img src="./templates/images/5.jpg" id="myPic" class="center" />
				<!-- 注意：导航图片后期应该为只有导航箭头，背景为透明，然后通过css来控制背景 -->
				<!-- 这里先暂时使用淘宝上的截图 -->
				<img src="./templates/images/left.png" id="left" class="left"
					onclick="showLast()" onmouseover="darked(this)"
					onmouseout="light(this)" /> <img src="./templates/images/right.png"
					id="right" class="right" onclick="showNext()"
					onmouseover="darked(this)" onmouseout="light(this)" />
			</div>
			<div class="tips">此处为购物小贴士</div>

		</div>
		<!--下方的各种分类（店家、热销商品、聚划算等)-->
		<div class="sets">
			<!--标题-->
			<div class="title">
				<!--span没有name属性-->
				<span id="shop_label" onmouseover="update(this)">店家</span> <span
					id="hot_label" onmouseover="update(this)">热销商品</span> <span
					id="tuangou_label" onmouseover="update(this)">聚划算</span> <span
					id="miaosha_label" onmouseover="update(this)">整点秒杀</span> <span
					id="huangou_label" onmouseover="update(this)">积分换购</span>
			</div>
			<!--店家-->
			<div class="shop" id="shop">此处为店铺详细信息</div>
			<!--热销商品-->
			<div class="hot" id="hot">热销商品排行</div>
			<!--聚划算-->
			<div class="huasuan" id="tuangou">团购信息</div>
			<!--整点秒杀-->
			<div class="miaosha" id="miaosha">整点秒杀</div>
			<!--积分换购-->
			<div class="huangou" id="huangou">积分换大奖了</div>
		</div>

	</div>
	<script type="text/javascript" language="javascript"
		src="./templates/js/index.js"></script>

</body>
</html>
