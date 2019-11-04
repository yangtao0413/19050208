<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
	<h3>商品品牌</h3></hr>
	<form class="form-horizontal" role="form" action="{{url('brand/add_do')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
	    <div class="col-sm-10">
	      <input type="text" name="brand_name" class="form-control" id="firstname" placeholder="请输入品牌名称">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
	    <div class="col-sm-10">
	      <input type="text" name="brand_url" class="form-control" id="lastname" placeholder="请输入品牌网址">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">品牌logo</label>
	    <div class="col-sm-10">
	       <input type="file" name="brand_logo" id="inputfile">
	    </div>
	  </div>
	 
	  <div class="form-group">
	  <label for="lastname" class="col-sm-2 control-label">是否显示</label>
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="radio" name="is_show" value="1" checked="checked">是  <input type="radio" name="is_show" value="0">否
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">提交</button>
	    </div>
	  </div>
	</form>


</body>
</html>