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
require_once dirname ( __FILE__ ) . '/' . './classes/Order.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/OrderService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/Common.class.php';

session_start ();

$order = new Order ();
$orderService = new OrderService ();
$user = new User ();

if (! empty ( $_SESSION ['u_id'] )) {
	$order->setO_user_id ( $_SESSION ['u_id'] );
	$user->setU_id ( $_SESSION ['u_id'] );
	
	$orderService->getAllOrder ( $order );
} else {
	
	echo "<a>亲,请先登录哦</a>";
	exit ();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的订单</title>
<link href="./templates/css/indent.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript"
	src="./templates/js/navigate.js"></script>
<link href="./templates/css/navigate.css" rel="stylesheet"
	type="text/css" />
</head>

<body bgcolor="#F2F2F2">
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
	<div class="dd"
		style="font-size: 50px; font-family: Microsoft YaHei; font-weight: bold;">我&nbsp;&nbsp;&nbsp;的&nbsp;&nbsp;&nbsp;订&nbsp;&nbsp;&nbsp;单</div>
	<div class="bj">
		<?php
		// 获得订单的结合
		$arr = $order->getI_arr ();
		
		// 个数
		$count = count ( $arr );
		
		$tempOrder = new Order ();
		
		$item = new Item ();
		$itemService = new ItemService ();
		
		for($i = 0; $i < $count; $i ++) {
			
			$o_item_id = $arr [$i] ['o_item_id'];
			$o_nums = $arr [$i] ['o_nums'];
			$o_price = $arr [$i] ['o_price'];
			$o_total_price = $arr [$i] ['o_total_price'];
			$o_date = $arr [$i] ['o_date'];
			$o_isordered = $arr [$i] ['o_isordered'];
			
			$item->setI_id ( $o_item_id );
			$itemService->getItemPic ( $item );
			
			//$info = "<div class='p1'><div class='sptp'><img src='./tools/imageShow.php?id={$user->getU_id()}&name={$item->getI_picture()}' style='width:200px; height:200px;margin-left:20px;float:left;'/></div><div class='spxx'>{$item->getI_name()}</div><div class='spdj'>{$order->getO_price()}</div><div class='spsl'>{$order->getO_nums()}</div><div class='spzj'>{$order->getO_total_price()}</div></div>";
			
			
			$info="";
			
			$info.="<div class='p1'>";
			$info.="<div class='sptp'>";
			$info.="<img src='./tools/imageShow.php?id={$user->getU_id()}&name={$item->getI_picture()}' style='width:90px;height:90px;'/>";
			$info.="</div>";
			$info.="<div class='spxx'>";
			$info.="商品信息: ".$item->getI_name();
			$info.="</div>";
			$info.="<div class='spdj'>";
			$info.="单价: ".$o_price;
			$info.="</div>";
			$info.="<div class='spsl'>";
			$info.="数量: ".$o_nums;
			$info.="</div>";
			$info.="<div class='spzj'>";
			$info.="总金额: ".$o_total_price;
			$info.="</div>";
			$info.="</div>";
			
			echo $info;
		}
		
		?>
	
		<!--  <div class="p1">
			<div class="sptp">商品图片</div>
			<div class="spxx">商品信息</div>
			<div class="spdj">商品单价</div>
			<div class="spsl">商品数量</div>
			<div class="spzj">商品总价</div>
		

		<!-- 
<div class="dz" style="font-size:25px;font-family:microsoft yahei;font-weight:bold;">确认收货地址:</div>
<div class="shdz">

<table>
<tr>
<td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;收货地址</td>
<td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;收货人&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;联系方式</td>
</tr>
<tr>
<td><input type="text" name="shdz" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" name="shr" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" name="lxfs" /></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="提交订单" style="width: 100px; height: 30px; background-color: #E33D3F; color: white;" /></td>
</tr>
</table>
</div> 
 -->
	</div>
</body>
</html>
