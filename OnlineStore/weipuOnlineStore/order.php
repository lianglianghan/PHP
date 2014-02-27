<?php
header ( "content-type:text/html;charset=utf-8" );

session_start ();

// 从立即购买界面跳转过来的，说明用户一定登录
// echo "欢迎来到订单界面";

// 获取提交过来的属性
$o_user_id = $_SESSION ['u_id'];
$o_item_id = $_POST ['i_id'];
$o_nums = $_POST ['nums'];
$o_price = $_POST ['price'];
$i_name = $_POST ['i_name'];

?>
<html>
<head>
<title>提交订单</title>
<script type="text/javascript" src="./templates/js/order.js"></script>
</head>
<body>
	<form action="./orderProcess.php" id="order_detail_form" method="post">
		<div>
			<div>
				<h1>请填写收货地址</h1>

				收货人姓名:<input type="text" id="a_name" name="add_name" /> 联系电话:<input
					type="text" id='a_mobile' name="add_mobile" /> 收货地址:<input
					type="text" id='a_address' name="add_address" /><br /> <br /> <span
					id="errorMessage"></span>
			</div>
			<div>
				<h1>订单详情如下所示</h1>

				<a>商品名称:<?php echo $i_name;?></a><br /> <a>单价:<?php echo $o_price;?></a><br />
				<a>数量:<?php echo $o_nums;?></a><br /> <a>总金额:<?php echo $o_nums*$o_price;?></a><br />
			<?php
			
			echo "<input type='hidden' id='u_id' value=" . $o_user_id . " />";
			echo "<input type='hidden' name='i_id' value=" . $o_item_id . " />";
			echo "<input type='hidden' name='price' value=" . $o_price . " />";
			echo "<input type='hidden' name='nums' value=" . $o_nums . " />";
			?>
			<input type="button" value="提交订单" onclick="commit()" />

			</div>
		</div>
	</form>
</body>
</html>