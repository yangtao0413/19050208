<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>

</head>
<body>
	<form action="/Andex/store" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
            @if ($errors->any())
		<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
		</div>
		@endif
		<table>
			<tr>
				<td>网站名称</td>
				<td><input type="text" name="name"> @if($errors->has('name'))<p>{{$errors->first('name')}}</p>@endif</td>
			</tr>
			<tr>
				<td>网站网址</td>
				<td><input type="text" name="eamil"> @if($errors->has('eamil'))<p>{{$errors->first('eamil')}}</p>@endif</td>
			</tr>
			<tr>
				<td>链接类型</td>
				<td><input type="radio" name="link" value="1" checked="checked">LOGO链接  <input type="radio" name="link" value="0">文字链接</td>
			</tr>
			<tr>
				<td>图片LOGO</td>
				<td><input type="file" name="head"></td>
			</tr>
			<tr>
				<td>网站联系人</td>
				<td><input type="text" name="c_name"></td>
			</tr>
			<tr>
				<td>网站介绍</td>
				<td><input type="text" name="c_duce"></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td><input type="radio" name="sex" value="1" checked="checked">是  <input type="radio" name="sex" value="0">否</td>
			</tr>
			<tr>
				<td><input type="submit" value="确认"></td>
				<td><input type="reset" value="取消"></td>
			</tr>
		</table>
	</form>
</body>
</html>