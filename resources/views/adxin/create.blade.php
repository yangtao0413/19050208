<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	商品图片：<img src="{{env('UPLOAD_URL')}}{{$data->g_img}}" width="100">
	商品名称：<input type="text" name="g_name" value="{{$data->g_name}}">
</body>
</html>