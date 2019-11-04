<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	
	<table border=1>
		<tr>
			<td>品牌ID：</td>
			<td>品牌名称：</td>
			<td>品牌网址：</td>
			<td>品牌logo：</td>
			<td>是否显示：</td>
		</tr>
		@foreach ($data as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100"></td>
			<td>{{$v->is_show?'显示':'不显示'}}</td>
			<td>
				<a href="{{url('/brand/edit',['id'=>$v->brand_id])}}">编辑</a>
				<a href="{{url('/brand/delete',['id'=>$v->brand_id])}}">删除</a>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>