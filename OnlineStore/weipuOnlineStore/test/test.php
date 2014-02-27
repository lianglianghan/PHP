<?php

// 	require_once '../tools/SqlHelper.class.php';
	
// 	$sqlHelper=new SqlHelper();
	
// 	$sql="insert into user_basic(ub_password,ub_email,ub_nickname) values (md5('123456'),'qiuhunjihl@163.com','开然未果')";
	
// 	$res=$sqlHelper->execute_dml($sql);
	
// 	echo $res;
	
// 	echo "<pre>";
// 	$sql="select * from user_basic";
// 	$res=$sqlHelper->execute_dql($sql);
// 	print_r($res);
// 	echo "</pre>";


/**
 * 此段代码主要实现注册为店主，程序为店主创建相应的文件夹，文件夹名称为店主的id号
 */
// require_once '../classes/User.class.php';
// require_once '../classes/UserService.class.php';
// require_once '../classes/Common.class.php';


// $userService=new UserService();
// $user=new User();
// $user->setU_email("qiuhunjihl@gmail.com");
// $user->setU_isowner('1');
// $flag=$userService->setOwner($user);

// // echo $user->getU_isowner();
// // exit();

// if($flag==1){
// 	//在upload文件夹下为用户创建文件夹,名称为用户邮箱
// 	//$user_path=$_SERVER['DOCUMENT_ROOT'].'/weipuOnlineStore/upload/'.$user->getU_email();
// 	$user_path=$_SERVER['DOCUMENT_ROOT'].Common::$uploadPath.$user->getU_id();
// 	//echo $user_path;
// 	//echo "<br/>".$user->getU_id();
// 	//判断是否为店主
// 	if ($user->getU_isowner()=='1') {
// 		//echo $user_path;
// 		//创建文件夹
// 		if (!file_exists($user_path)) {
// 			mkdir($user_path);
// 		}
// 	}else{
// // 		if (file_exists($user_path)) {
// // 			$arr=scandir($user_path);
// // 			//print_r($arr);
// // 			foreach ($arr as $key=>$val){
// // 				if ($val!='.'&&$val!='..') {
// // 					;
// // 				}
// // 			}
// // 		}
// 	}
	
// }


//对商店进行初始化
// require_once '../classes/Store.class.php';
// require_once '../classes/StoreService.class.php';

// $store=new Store();
// $store->setS_user_id(2);
// $store->setS_name("亮亮之家");
// $store->setS_introduce("打造最完美的，最成熟的世界");

// $storeService=new StoreService();
// $flag=$storeService->initStore($store);

// echo $flag;




//添加新的商品
// require_once '../classes/Item.class.php';
// require_once '../classes/ItemService.class.php';

// $item=new Item();
// $item->setI_name("发蜡");
// $item->setI_nums(100);
// $item->setI_price(29.9);
// $item->setI_province("河南");
// $item->setI_category("美发");
// $item->setI_store_id(1);
// $item->setI_introduce("让头发更加绚丽，更加迷人，更加吸引");

// $itemService=new ItemService();
// $flag=$itemService->addItem($item);

// echo $flag;



//为商品添加图片







//添加新的收货地址
// require_once '../classes/Address.class.php';
// require_once '../classes/AddressService.class.php';

// $address=new Address();
// $address->setA_id(1);
// $address->setA_name("韩亮");
// $address->setA_mobile("18025163472");
// $address->setA_address("广东东莞市塘厦镇莆心湖");

// $addressService=new AddressService();
// $flag=$addressService->addAddress($address);
// echo $flag;



//增加新的订单
// require_once '../classes/Order.class.php';
// require_once '../classes/OrderService.class.php';

// $order=new Order();
// $order->setO_item_id(1);
// $order->setO_user_id(1);
// $order->setO_nums(5);
// $order->setO_price(2.2);
// $order->setO_total_price(11);
// $order->setO_date(date("Y-m-d H:i:s"));
// //当付款后订单改为已订购
// $order->setIsordered('0');
// $orderService=new OrderService();
// $flag=$orderService->addOrder($order);

// echo $flag;



//添加商品到购物车
//在浏览器没关闭之前放在session中，关闭后将信息存储在数据库中并将session文件销毁
// require_once '../classes/Cart.class.php';
// require_once '../classes/CartService.class.php';

// $cart=new Cart();
// $cart->setC_item_id(1);
// $cart->setC_user_id(2);
// $cart->setC_item_nums(20);

// $cartService=new CartService();
// $flag=$cartService->addCart($cart);
// echo $flag;

// if (flag==0) {
// 	//失败
// }else{
// 	if($flag==1){
// 		//添加成功，并影响数据库
// 	}else if($flag==2){
// 		//执行成功，但不影响数据库
// 	}
// }



//添加新的评论
//在添加评论的时候需要登录，并且发表的时候需要验证码或者对评论的次数进行限制
// require_once '../classes/Evaluate.class.php';
// require_once '../classes/EvaluateService.class.php';

// $evaluate=new Evaluate();
// $evaluate->setE_order_id(1);
// //显示订单时所需要的用户名，如果不给的话需要从订单表中查询
// $evaluate->setE_user_id(1);
// $evaluate->setE_date(date("Y-m-d H:i:s"));
// $evaluate->setE_info("发货速度神速，一个字赞");

// $evaluateService=new EvaluateService();
// $flag=$evaluateService->addEvaluate($evaluate);
// echo $flag;


?>