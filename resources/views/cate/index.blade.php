<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<table border=1>
	
		<tr>
			<th class="center">
				<label>
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</th>
			<td>分类id</td>
			<td>分类名称</td>
			<td>是否展示</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr style="display: none" parent_id="{{$v->parent_id}}" cate_id="{{$v->cate_id}}">
			<td class="center">
				<label>
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</td>
			<td>
			{{str_repeat('-',($v->level)*3)}}
			<a href="javascript:;" class="flag">⊿</a>
			{{$v->cate_id}}
			</td>
			<td>
			{{str_repeat('-',($v->level)*3)}}
			{{$v->cate_name}}
			</td>
			<td>{{$v->cate_show?'是':'否'}}</td>
			
			<td><a href="{{url('/cate/edit/'.$v->cate_id)}}">编辑</a>| <a href="javascript:;" id="del">删除</a></td>
			
		</tr>
		@endforeach
	</table>
</body>
</html>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		} });
	//页面一加载
	$("tr[parent_id='0']").show();
	//点击符号
	$(".flag").click(function(){
		var _this=$(this);
		var cate_id=_this.parents('tr').attr('cate_id');
		var flag=_this.text();//获取当前符号
		var _child=$("tr[parent_id='"+cate_id+"']");
		// var _childs=_this.siblings("tr[parent_id='"+cate_id+"']");
		if(flag=='⊿'){
			if(_child.length>0){
				_child.show();//给当前分类下子类做显示
				_this.text('▽');
			}
		}else{
			_child.hide();//给当前分类下子类做隐藏
			_this.text('⊿');
		}
	});
	$(document).on('click','#del',function(){
		var _this=$(this);
		var cate_id=_this.parents('tr').attr('cate_id');
		$.post(
				"{{url('/cate/deletd')}}",
				{cate_id:cate_id},
				function(res){
					if(res==1){
						alert('删除成功')
						_this.parents('tr').remove();
					}else if(res==2){
						alert('内有子类不能删除')
					}
				}
		)
	})
</script>