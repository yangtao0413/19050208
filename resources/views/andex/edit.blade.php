<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
	
</head>
<body>
	<form action="{{url('Andex/update/'.$data->index_id)}}" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
		<table>
			<tr>
				<td>网站名称</td>
				<td><input type="text" name="name" value="{{$data->name}}"></td>
			</tr>
			<tr>
				<td>网站网址</td>
				<td><input type="text" name="eamil" value="{{$data->eamil}}"></td>
			</tr>
			<tr>
				<td>链接类型</td>
				<td><input type="radio" name="link" value="1" @if($data->link==1)  checked="checked" @endif>LOGO链接
				    <input type="radio" name="link" value="0" @if($data->link==0)  checked="checked" @endif>文字链接
				</td>
			</tr>
			<tr>
				<td>图片LOGO</td>
				<td><img src="{{env('UPLOAD_URL')}}{{$data->head}}" width="100"><input type="file" name="head"></td>
			</tr>
			<tr>
				<td>网站联系人</td>
				<td><input type="text" name="c_name" value="{{$data->c_name}}"></td>
			</tr>
			<tr>
				<td>网站介绍</td>
				<td><input type="text" name="c_duce" value="{{$data->c_duce}}"></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td><input type="radio" name="sex" value="1" @if($data->sex==1)  checked="checked" @endif>是
				    <input type="radio" name="sex" value="0" @if($data->sex==0)  checked="checked" @endif>否
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="确认"></td>
				<td><input type="reset" value="取消"></td>
			</tr>
		</table>
	</form>
</body>
</html>