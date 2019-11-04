<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
    /*分页*/
    .pagination {}
    .pagination li {display: inline-block;margin-right: -1px;padding: 5px;border: 1px solid #e2e2e2;min-width: 20px;text-align: center;}
    .pagination li.active {background: #009688;color: #fff;border: 1px solid #009688;}
    .pagination li a {display: block;text-align: center;}
    </style>

</head>
<body>
	<table border=1>
		<tr>
			<td>商品id</td>
			<td>商品图片</td>
			<td>商品名称</td>
			<td>操作</td>
		</tr>
		@foreach($info as $v)
		<tr>
			<td>{{$v->g_id}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="100"></td>
			<td>{{$v->g_name}}</td>
			<td><a href="{{url('adxin/create/'.$v->g_id)}}">详情</a></td>
		</tr>
		@endforeach
	</table>
	{{$info->links()}}
</body>
</html>