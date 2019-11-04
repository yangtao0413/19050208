<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
</head>
<body>
	<h3>管理员列表</h3>
	<form action="">
	<select name="keys">
		<option value="">请选择</option>
		<option value="email" @if(isset($query['keys']) && ($query['keys']=='email')) selected="selected" @endif>邮箱</option>
		<option value="tel" @if(isset($query['keys']) && ($query['keys']=='tel')) selected="selected" @endif>手机号</option>
	</select>
		<input type="text" name="keyval" value="{{$query['keyval']??''}}" placeholder="请输入邮箱/手机号">
		<input type="text" name="name" value="{{$query['name']??''}}" placeholder="请输入管理员姓名">
		<button>搜索</button>
	</form>
	<table border=1>
		<tr>
			<td>管理员id</td>
			<td>管理员头像</td>
			<td>管理员名称</td>
			<td>管理员邮箱</td>
			<td>管理员手机号</td>
			<td>管理员性别</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->admin_id}}</td>
			<td>@if($v->head)<img src="{{env('UPLOAD_URL')}}{{$v->head}}" width="100">@endif{{$v->name}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->email}}</td>
			<td>{{$v->tel}}</td>
			<td>{{$v->sex?'男':'女'}}</td>
			<td>
				<a href="{{url('/Admin/edit/'.$v->admin_id)}}">编辑</a>
				<a href="{{url('/Admin/delete/'.$v->admin_id)}}">删除</a>
			</td>
		</tr>
		@endforeach
	</table>
			{{$data->appends($query)->links() }}

</body>
</html>