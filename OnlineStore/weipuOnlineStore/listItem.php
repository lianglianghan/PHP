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

header ( "content-type:text/html;charset=utf-8" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>搜索商品</title>
<script type="text/javascript" language="javascript"
	src="./templates/js/navigate.js"></script>
<link href="./templates/css/navigate.css" rel="stylesheet"
	type="text/css" />
<link href="./templates/css/search.css" rel="stylesheet" type="text/css">

</head>
<body bgcolor="#D6D6D6">
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


	<!-- 下方用来显示搜索出来的商品 -->
	<div class="bj">
	
	<?php
	
	// 商品数组
	// $itemArr=array();
	$item = new Item ();
	$itemService = new ItemService ();
	
	$store = new Store ();
	$storeService = new StoreService ();
	
	// 取得传过来的item_key
	if (! empty ( $_REQUEST ['item_key'] )) {
		$item_key = $_REQUEST ['item_key'];
	} else {
		$item_key = "";
	}
	
	$item->setKey ( $item_key );
	// 取得所有商品
	// $itemService->getAllItemInfo ( $item );
	// 搜索商品
	
	$itemService->searchItem ( $item );
	// print_r($item);
	$arr = $item->getI_arr ();
	// print_r($arr);
	$count = count ( $arr );
	
	if ($count == 0) {
		echo "抱歉没有找到您查找的商品";
		exit ();
	}
	
	// echo $count;
	// exit();
	for($i = 0; $i < $count; $i ++) {
		$i_sore_id = $arr [$i] ['i_store_id'];
		$i_picture = $arr [$i] ['i_picture'];
		$i_name=$arr[$i]['i_name'];
		$store->setS_id ( $i_sore_id );
		$storeService->getOwnerId ( $store );
		// echo $store->getS_user_id()."<br/>";
		// echo $i_picture;
		echo "<div class='spbj'>";
		echo "<div class='k1'>";
		echo "<a href='./item.php?item_logo={$i_picture}'><img src='./tools/imageShow.php?id={$store->getS_user_id()}&name={$i_picture}' style='width:220px; height:220px;float:left;'/></a>";
		echo "</div>";
		echo "<div class='j1'>";
		echo $i_name;
		echo "</div>";
		echo "</div>";
	}
	
	?>
	
	</div>


	<!--  <div class="bj">
		<div class="spbj">
			<div class="k1"></div>
			<div class="j1"></div>
		</div>

	</div>-->

	<!--  	</div>
	<div class="bj">
	<div class="k1"></div>
	<div class="k2"></div>
	<div class="k3"></div>
	<div class="k4"></div>
	<div class="k5"></div>
	<br></br>
	<div class="j1"></div>
	<div class="j2"></div>
	<div class="j3"></div>
	<div class="j4"></div>
	<div class="j5"></div>
	</div>-->

</body>
</html>

