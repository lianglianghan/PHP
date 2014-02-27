<?php

require_once dirname ( __FILE__ ) . './classes/Order.class.php';
require_once dirname ( __FILE__ ) .'./classes/OrderService.class.php';
require_once dirname ( __FILE__ ) .'./classes/Address.class.php';
require_once dirname ( __FILE__ ) .'./classes/AddressService.class.php';

header ( "content-type:text/html;charset=utf-8" );

session_start ();

// 从立即购买界面跳转过来的，说明用户一定登录
//echo "欢迎来到订单界面";

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


//获取提交过来的属性
$o_user_id = $_SESSION ['u_id'];
$o_item_id = $_POST ['i_id'];
$o_nums = $_POST ['nums'];
$o_price = $_POST ['price'];
$o_date = date ( "Y-m-d H:i:s" );

$a_id=$_SESSION['u_id'];
$a_name=$_POST['add_name'];
$a_mobile=$_POST['add_mobile'];
$a_address=$_POST['add_address'];


//向后台提交相应的数据
$order=new Order();
$orderService=new OrderService();
$order->setO_user_id($o_user_id);
$order->setO_item_id($o_item_id);
$order->setO_nums($o_nums);
$order->setO_price($o_price);
$order->setIsordered('0');
$order->setO_date($o_date);
$order->setO_total_price($o_nums*$o_price);


$address=new Address();
$addressService=new AddressService();
$address->setA_id($a_id);
$address->setA_name($a_name);
$address->setA_mobile($a_mobile);
$address->setA_address($a_address);



//print_r($address);

//print_r($order);
//exit();

//提交
$flag1=$addressService->addAddress($address);
$flag1=$orderService->addOrder($order);



echo "<a href='#'>前往收银台付款</a>";
echo "<a href='#'>返回继续购物</a>";
//echo $order->getO_id();

//接下来等待付款

?>