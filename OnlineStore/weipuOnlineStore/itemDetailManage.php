<?php
if (! empty ( $_GET ['pic'] )) {
	$pic = $_GET ['pic'];
} else {
	echo "请先添加商品";
	exit ();
}
// echo $pic;
// exit();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品详细信息</title>
<link href="./templates/css/addpicture.css" type="text/css"
	rel="stylesheet" />
</head>
<!-- 图片上传预览需要的jQuery代码 -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
	type="text/javascript"></script>
<script src="./templates/js/uploadPreview.js" type="text/javascript"></script>
<script>
        $(function () {
            $("#up1").uploadPreview({ Img: "ImgPr1", Width: 400, Height: 400 });
            $("#up2").uploadPreview({ Img: "ImgPr2", Width: 400, Height: 400 });
            $("#up3").uploadPreview({ Img: "ImgPr3", Width: 400, Height: 400 });
            $("#up4").uploadPreview({ Img: "ImgPr4", Width: 400, Height: 400 });
            $("#up5").uploadPreview({ Img: "ImgPr5", Width: 400, Height: 400 });
        });
    </script>

<body bgcolor="#F2F2F2">
	<div class="bj">
		<div class="dh" style="font-size: 25px; color: blue;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;详&nbsp;&nbsp;&nbsp;细&nbsp;&nbsp;&nbsp;信&nbsp;&nbsp;&nbsp;息</div>
		<form action="./itemDetailManageProcess.php" method="post"
			enctype="multipart/form-data">
			<table>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" id="up1" name="picture1" /></td>
					<td><div class="img1">
							<img id="ImgPr1" width="400" height="400" />
						</div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" id="up2" name="picture2" /></td>
					<td><div class="img2">
							<img id="ImgPr2" width="400" height="400" />
						</div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" id="up3" name="picture3" /></td>
					<td><div class="img1">
							<img id="ImgPr3" width="400" height="400" />
						</div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" id="up4" name="picture4" /></td>
					<td><div class="img1">
							<img id="ImgPr4" width="400" height="400" />
						</div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" id="up5" name="picture5" /></td>
					<td><div class="img1">
							<img id="ImgPr5" width="400" height="400" />
						</div></td>
				</tr>
				<!--  <tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" name="pic" accept="image/gif" /></td>
					<td><div class="img2"></div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" name="pic" accept="image/gif" /></td>
					<td><div class="img3"></div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" name="pic" accept="image/gif" /></td>
					<td><div class="img4"></div></td>
				</tr>
				<tr>
					<td
						style="float: left; margin-left: 100px; margin-top: 100px; line-height: 500px;"><input
						type="file" name="pic" accept="image/gif" /></td>
					<td><div class="img5"></div></td>
				</tr>-->
			</table>
			<?php echo "<input type='hidden' name='pic' value='$pic'/>";?>
			<input type="submit" value="确定上传" />
		</form>
	</div>
</body>
</html>
