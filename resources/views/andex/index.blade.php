<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<form action="">
		<input type="text" name="name" value="{{$query['name']??''}}" placeholder="请网站名称">
		<button>搜索</button>
	</form>
	<table border=1>
	<table border=1>
		<tr>
			<td>网站id</td>
			<td>网站名称</td>
			<td>网址</td>
			<td>图片LOGO</td>
			<td>链接类型</td>
			<td>网站联系人</td>
			<td>网站介绍</td>
			<td>状态</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr index_id="{{$v->index_id}}">
			<td>{{$v->index_id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->eamil}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->head}}" width="100"></td>
			<td>{{$v->link?'LOGO链接':'文字链接'}}</td>
			<td>{{$v->c_name}}</td>
			<td>{{$v->c_duce}}</td>
			<td>{{$v->sex?'是':'否'}}</td>
			<td><a href="{{url('/Andex/edit/'.$v->index_id)}}">编辑|<a href="javascript:;" id="delete">删除</a></td>
		</tr>
		@endforeach
	</table>
		{{$data->appends($query)->links() }}
</body>
</html>
<script>
$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });
    $(document).on('click','#delete',function(){
      var _id=$(this).parents('tr').attr('index_id');
        var _this=$(this);
        $.post(
            "{{url('Andex/delete')}}",
                {id:_id},
                function(res){
               if(res==1){
                   alert('删除成功')
                   _this.parents('tr').remove();
               }else{
                   alert('删除失败')
               }
                }


        )
    })
})
</script>
