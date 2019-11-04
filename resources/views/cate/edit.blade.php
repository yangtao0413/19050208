<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
	<script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<h3>商品分类管理</h3></hr>
	<form class="form-horizontal" role="form" action="{{url('/cate/update/'.$data->cate_id)}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}

	<!-- @if ($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif -->
	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
	    <div class="col-sm-10">
	      <input type="text" name="cate_name" value="{{$data->cate_name}}" class="form-control" id="firstname" placeholder="请输入管理员名称">
	      <!-- @if($errors->has('name'))<p style="color:red">{{$errors->first('name')}}</p>@endif -->
	    </div>
	  </div>
	  <div class="form-group">
	  <label for="lastname" class="col-sm-2 control-label">是否展示</label>
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="radio" name="cate_show" value="1" @if($data->cate_show==1) checked="checked" @endif>是  <input type="radio" name="cate_show" value="0" @if($data->cate_show==0) checked="checked" @endif>否
	        </label>
	      </div>
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
	    <div class="col-sm-10">
		  	<select name="parent_id">
				<option value="">--请选择--</option>
				@foreach($Info as $v)
				@if($data->parent_id==$v->cate_id)
				<option value="{{$v->cate_id}}" selected="">{{str_repeat('-',($v->level)*3)}}{{$v->cate_name}}</option>
				@else
				<option value="{{$v->cate_id}}">{{str_repeat('-',($v->level)*3)}}{{$v->cate_name}}</option>
				@endif
				@endforeach
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <input type="submit" class="btn btn-default" value="提交">
	    </div>
	  </div>
	</form>

</body>
</html>
