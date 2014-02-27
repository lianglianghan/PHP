<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once dirname ( __FILE__ ) . '/' . './classes/Item.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/ItemService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Picture.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/PictureService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/User.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Store.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/StoreService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Common.class.php';

session_start ();

if (! empty ( $_SESSION ['u_id'] )) {
	$u_id = $_SESSION ['u_id'] . "";
} else {
	$u_id = "noid";
}

if (empty ( $_GET ['item_logo'] )) {
	header ( "Location:./index.php" );
	exit ();
}

$item = new Item ();
$item->setI_picture ( $_GET ['item_logo'] );
$itemService = new ItemService ();
$itemService->getItemInfo ( $item );

$user = new User ();
$userService = new UserService ();

$store = new Store ();
$storeService = new StoreService ();

// 获取店铺的店主id,以便于下一步用于取文件夹
$store->setS_id ( $item->getI_store_id () );
$storeService->getOwnerId ( $store );

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品介绍</title>
<link href="./templates/css/introduction_1.css" rel="stylesheet"
	type="text/css" />
<link href="./templates/css/navigate.css" rel="stylesheet"
	type="text/css" />
<script type="text/javascript" language="javascript"
	src="./templates/js/item.js"></script>
<script type="text/javascript" language="javascript"
	src="./templates/js/ajax.js"></script>
<script type="text/javascript" language="javascript"
	src="./templates/js/navigate.js"></script>

</head>

<body bgcolor="#F2F2F2">
	<!--  <div class="daohang"></div>-->

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
			<br /> <a href="./storeRegister.php">&nbsp;&nbsp;我要开店</a><br /> <a
				href="./itemManage.php">&nbsp;&nbsp;商品管理</a><br /> <a href="#">&nbsp;&nbsp;我的订单</a><br />
			<a href="./logout.php">&nbsp;&nbsp;注销退出</a>
		</div>
		<!--客服-->
		<div class="assistant">
			<span>在线客服</span>
		</div>
	</div>

	<div class="beijing">
		<div class="sptp">
		<?php  echo "<img src='./tools/imageShow.php?id={$store->getS_user_id()}&name={$item->getI_picture()}' style='width:400px;height:400px;' />"; ?>
		</div>
		<form action="./order.php" method="post" id="form1">
			<div class="spxx">
				<div class="spmc"
					style="font-size: 25px; font-family: Microsoft YaHei; top: 20px;"><?php echo $item->getI_name();?></div>
				<div class="jg"
					style="font-size: 25px; font-family: Verdana, Geneva, sans-serif">
					价&nbsp;&nbsp;&nbsp;&nbsp;格:&nbsp;&nbsp;<a
						style="font-size: 30px; color: red; font-weight: bold;"><?php echo $item->getI_price();?></a>&nbsp;&nbsp;元
				</div>
				<div class="xl"
					style="font-size: 25px; font-family: Verdana, Geneva, sans-serif">
					库&nbsp;&nbsp;&nbsp;&nbsp;存:&nbsp;&nbsp;<a style="color: red;"><?php echo $item->getI_nums();?></a>&nbsp;&nbsp;件
				</div>
				<div class="gmsl"
					style="font-size: 25px; font-family: Verdana, Geneva, sans-serif">
					购买数量:&nbsp;&nbsp;<input type="text" name="nums" value="1"
						style="width: 50px; height: 30px; font-size: 20px;" />
				</div>
				<div class="an">
				
				<?php
				
				echo "<input type='hidden' id='u_id' value=" . $u_id . " />";
				echo "<input type='hidden' name='i_id' value=" . $item->getI_id () . " />";
				echo "<input type='hidden' name='price' value=" . $item->getI_price () . " />";
				echo "<input type='hidden' name='i_name' value=" . $item->getI_name() . " />";
				?>
				<input type="button" value="立即购买" onclick="isLogin()"
						style="width: 100px; height: 40px; background-color: #E33D3F; color: white; float: left; margin-left: 10px; margin-top: 10px;" />
					<input type="button" value="加入购物车"
						style="width: 100px; height: 40px; background-color: #E33D3F; color: white; margin-left: 30px; margin-top: 10px;" />
				</div>
			</div>
		</form>
		<div class="sets">
			<div class="title">
				<span id="spxq" onclick="m_switch(this)" class="spxq">商品详情</span> <span
					id="yhpl" onclick="m_switch(this)">用户评论</span>
			</div>
			<div class="shop" id="shop">
			<?php
			$picture = new Picture ();
			$pictureService = new PictureService ();
			$picture->setP_id ( $item->getI_id () );
			$pictureService->getPictureInfo ( $picture );
			$picArr = $picture->getP_path ();
			// 图片的数目
			$count = count ( $picArr );
			for($i = 0; $i < $count; $i ++) {
				echo "<img src='./tools/imageShow.php?id={$store->getS_user_id()}&name={$picArr[$i][0]}' /><br/>";
			}
			
			?>
			</div>
			<div class="pl" id="pl">此处为用户评论</div>
		</div>
	</div>
	<div id="login_dialog"
		style="display: none; POSITION: absolute; left: 60%; top: 60%; width: 330px; height: 350px; margin-left: -300px; margin-top: -200px; border: 1px solid #888; background-color: #edf; text-align: center;">
		<a style="font-size: 30px; font-family: Microsoft YaHei;">登录</a><br />
		<!--  <a href="javascript:closeLogin();">关闭登录框</a>-->
		<!--  <form action="">-->
		<div
			style="background-color: transparent; margin-left: 0px; margin-top: 40px; width: 330px; height: 150px;">


			<a
				style="margin-left: -180px; font-family: Microsoft YaHei; font-size: 18px;">邮箱</a>

			<br></br> <input style="margin-left: 10px; width: 220px;"
				type="text" name="email" id="email" /> <br></br> <a
				style="margin-left: -180px; font-family: Microsoft YaHei; font-size: 18px;">密码</a>

			<br></br> <input style="margin-left: 10px; width: 220px;"
				type="password" name="password" id="password" /> <br></br> <input
				type="button" value="提交登录" onclick="check()" /> &nbsp;&nbsp;&nbsp;<input
				type="button" value="取消登录" onclick="closeLogin()" />



			<div style="background-color: transparent; color: white;"
				id="errorMessage"></div>
		</div>
	</div>
</body>
</html>
