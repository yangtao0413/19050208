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
	<h3>管理员管理</h3></hr>
	<form class="form-horizontal" role="form" action="{{url('Admin/store')}}" method="post" enctype="multipart/form-data">
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
	    <label for="firstname" class="col-sm-2 control-label">管理员姓名</label>
	    <div class="col-sm-10">
	      <input type="text" name="name" class="form-control" id="firstname" placeholder="请输入管理员姓名">
	      @if($errors->has('name'))<p>{{$errors->first('name')}}</p>@endif
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">密&nbsp;&nbsp;码</label>
	    <div class="col-sm-10">
	      <input type="password" name="pwd" class="form-control" id="lastname" placeholder="请输入密码">
	      	      <p>{{$errors->first('pwd')}}</p>
	    </div>
	  </div>
	  	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">确认密码</label>
	    <div class="col-sm-10">
	      <input type="password" name="repwd" class="form-control" id="lastname" placeholder="请确认密码">
	      	      <p>{{$errors->first('repwd')}}</p>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">电&nbsp;&nbsp;话</label>
	    <div class="col-sm-10">
	      <input type="text" name="tel" class="form-control" id="lastname" placeholder="请输入电话">
	      	      <p>{{$errors->first('tel')}}</p>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">邮&nbsp;&nbsp;箱</label>
	    <div class="col-sm-10">
	      <input type="text" name="email" class="form-control" id="lastname" placeholder="请输入邮箱">
	      	      <p>{{$errors->first('email')}}</p>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">头像</label>
	    <div class="col-sm-10">
	       <input type="file" name="head" id="inputfile">
	       	      <p>{{$errors->first('head')}}</p>
	    </div>
	  </div>
	 
	  <div class="form-group">
	  <label for="lastname" class="col-sm-2 control-label">性别</label>
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="radio" name="sex" value="1" checked="checked">男  <input type="radio" name="sex" value="0">女
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <input type="button" class="btn btn-default" value="提交">
	    </div>
	  </div>
	</form>
<script>
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


//管理员名称
	$('#firstname').blur(function(){
		$(this).next().remove();
		var name = $(this).val();
		var obj = $(this);
		var reg = /^[\u4e00-\u9fa5a-zA-Z0-9_]{2,12}$/;
		if(!reg.test(name)){
			$(this).after('<p style="color:red">管理员名称由中文 字母 数字 下划线组成 长度为2-12位</p>');
		}


	});
	

	//密码
	$('input[name="pwd"]').blur(function(){
		$(this).next().remove();
		var pwd=$(this).val();
		var reg=/^[a-z0-9_-]{6,18}$/ ;
		if(!reg.test(pwd)){
			$(this).after('<p style="color:red">密码格式不正确</p>');
		}
	})

	//邮箱
	$('input[name="email"]').blur(function(){
		$(this).next().remove();
		var email=$(this).val();
		var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(!reg.test(email)){
			$(this).after('<p style="color:red">请输入正确邮箱</p>');
		}
	})



//手机号
	$('input[name="tel"]').blur(function(){
		$(this).next().remove();
		var tel = $(this).val();
		 var reg = /^1[356789]\d{9}$/;
		if(!reg.test(tel)){
			$(this).after('<p style="color:red">请输入正确的手机号</p>');
		}
	}); 

	//提交验证
	$('.btn-default').click(function(){
		var namefalg = telfalg = true;
		$('#firstname').next().remove();
		$('input[name="tel"]').next().remove();
		var name=$('#firstname').val();
		var reg= /^[\u4e00-\u9fa5a-zA-Z0-9_]{2,12}/;
		if(!reg.test(name)){
			$('#firstname').after('<p style="color:red">管理员名称由中文 字母 数字 下划线组成 长度为2-12位</p>');
			namefalg = false;
		}

		//用户唯一雅正
	$.ajax({
			method: "POST",
			url: "/admin/checkname",
			data: {name:name},
			async: false,
		}).done(function(msg){
			if(msg>0){
				$('#firstname').after('<p style="color:red">管理员名称已存在</p>');
			}
		})


		var tel = $('input[name="tel"]').val();4

		 var reg = /^1[356789]\d{9}$/;
		if(!reg.test(tel)){
			$('input[name="tel"]').after('<p style="color:red">请输入正确的手机号</p>');
			telfalg = false;
		}

		if(namefalg && telfalg){
			$('form').submit();			
		}


	});


</script>

</body>
</html>