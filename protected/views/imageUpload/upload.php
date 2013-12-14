<?php 
	$path=Yii::app()->request->baseUrl;
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo $path; ?>/css/upload.css">
	<script type="text/javascript" src="<?php echo $path; ?>/javascript/jquery/jquery-1.8.2.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>/javascript/upload.js"></script>
</head>
<body>
	<div class="photo">
		<form action="/myphoto/index.php/imageUpload/upload" method="post" enctype='multipart/form-data'>

		<div class="photoheader">
			<span id="filebutton">
			<input type="file" id="file" name="image[]" multiple="true" onChange="fileAction(this.files);">
			<a href="">上传图片</a>
			</span>
		</div>
		<div class="photobody" id="pho">
		</div>
		<div class="photofooter"><button type="submit">开始上传</button></div>
		</form>
	</div>
</body>
</html>