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
</head>

<body bgcolor="#F2F2F2">
	<div class="daohang"></div>

	<div class="beijing">
		<div class="sptp"></div>
		<div class="spxx">
			<div class="spmc">商品名称</div>
			<div class="jgsl">价格数量</div>
			<div class="an">
				<input type="submit" value="立即购买" /><input type="submit"
					value="加入购物车" />
			</div>
		</div>
		<div class="sets">
			<div class="title">
				<span id="spxq" onclick="m_switch(this)" class="spxq">商品详情</span> <span
					id="yhpl" onclick="m_switch(this)">用户评论</span>
			</div>
			<div class="shop" id="shop">此处为商品详细信息</div>
			<div class="pl" id="pl">此处为用户评论</div>
		</div>
	</div>

	<script type="text/javascript" language="javascript"
		src="./templates/js/item.js"></script>
</body>
</html>
