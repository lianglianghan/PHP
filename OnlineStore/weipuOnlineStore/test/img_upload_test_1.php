<html>
<?php  header("content-type:text/html;charset=utf-8");?>
<head></head>
<body>

	<form action="./img_uploadProcess.php">

		请选择图片<input type="file" id="upload_file" onchange="test()" /> <br /> <img
			src="../templates/images/store_logo_default.gif" id="img_upload" />
	</form>



	<script type="text/javascript">
		function showImg(obj)
		{
			window.alert(obj.value);
			var path=obj.value;
			var img=document.getElementById('img_upload');
			img.src="file://localhost/" + path;
		}

		function test(){
			 var filepath=getPath(document.getElementById("upload_file"));
			 window.alert(filepath);
			}

		
		function getPath(obj) {
			 if (obj) {
			  if (window.navigator.userAgent.indexOf("MSIE") >= 1) {
			   obj.select();
			   return document.selection.createRange().text;
			  } else if (window.navigator.userAgent.indexOf("Firefox") >= 1) {
			   if (obj.files) {
			    return obj.files.item(0).getAsDataURL();
			   }
			   return obj.value;
			  }
			  return obj.value;
			 }
			}
	</script>
</body>
</html>