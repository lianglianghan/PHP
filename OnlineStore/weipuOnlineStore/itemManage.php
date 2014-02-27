<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';
// 先判断是否为店主，如果不是则直接结束
header ( "content-type:text/html;charset=utf-8" );
session_start ();
if (! empty ( $_SESSION ['u_id'] )) {
	$userService = new UserService ();
	$flag = $userService->isOwner ( $_SESSION ['u_id'] );
	if (! $flag) {
		echo "请先注册店铺";
		exit ();
	}
} else {
	echo "请先登录";
	exit ();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品添加</title>
<link href="./templates/css/add.css" type="text/css" rel="stylesheet" />
<!-- 图片上传预览需要的jQuery代码 -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
	type="text/javascript"></script>
<script src="./templates/js/uploadPreview.js" type="text/javascript"></script>
<script>
        $(function () {
            $("#up").uploadPreview({ Img: "ImgPr", Width: 200, Height: 200 });
        });
    </script>
</head>

<body bgcolor="#F2F2F2">
	<div class="bj">
		<div class="dh" style="font-size: 25px; color: blue;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添&nbsp;&nbsp;&nbsp;加&nbsp;&nbsp;&nbsp;商&nbsp;&nbsp;&nbsp;品</div>
		<form action="./itemManageProcess.php" method="post"
			enctype="multipart/form-data">
			<div class="fenlei">
				选择商品的分类：&nbsp;&nbsp;大类：<select name="i_category">
					<option selected="selected">彩妆用品</option>
					<option>工具器械</option>
					<option>生活用品</option>
					<option>学习工具</option>
				</select>&nbsp;&nbsp;小类：<select>
					<option>彩妆用品</option>
					<option>工具器械</option>
					<option>生活用品</option>
					<option>学习工具</option>
				</select>
			</div>

			<table style="float: left; margin-left: 50px; margin-top: 50px;">
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;">商品名称</td>
					<td><input type="text" name="i_name" style="width: 200px;" /></td>
				</tr>
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;">商品规格</td>
					<td><input type="text" name="i_size" /></td>
				</tr>
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;">商品颜色</td>
					<td><input type="text" name="i_color" /></td>
				</tr>
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;">商品产地</td>
					<td><input type="text" name="i_province" /></td>
				</tr>

				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 35px; float: left; margin-left: 250px;">商品价格</td>
					<td>&nbsp;市场价&nbsp;<input type="text" name="i_price"
						style="width: 40px;" />&nbsp;&nbsp;&nbsp;&nbsp;vip价格 <input
						type="text" name="i_vip_price" style="width: 40px;" /></td>
				</tr>
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;">商品库存</td>
					<td><input type="text" name="i_nums" /></td>
				</tr>
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;">商品图片</td>
					<!--  <td><input type="file" name="i_picture" /></td>-->
					<td><div>
							<input type="file" id="up" name="i_picture" />
							<div>
								<img id="ImgPr" width="200" height="200" />
							</div>
						</div></td>

				</tr>
				<tr>
					<td
						style="font-size: 15px; color: #999999; line-height: 50px; float: left; margin-left: 250px;margin-top: 20px;">商品介绍</td>
					<td><textarea rows="10" cols="60" name="i_introduce" style="margin-top: 20px;"></textarea></td>

				</tr>
			</table>
			<div class="submit">
				<input type="submit" value="提交"
					style="width: 200px; height: 40px; background-color: #E33D3F; color: white; margin-left: 500px; margin-top: 50px;" />
			</div>


		</form>
	</div>

</body>
</html>
