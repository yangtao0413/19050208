<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>商品ID</td>
            <td>商品名称</td>
            <td>商品图片</td>
            <td>商品价格</td>
            <td>商品库存</td>
            <td>是否精品</td>
            <td>是否新品</td>
            <td>是否热卖</td>
            <td>所属分类</td>
            <td>所属品牌</td>
            <td>商品操作</td>
        </tr>
        @foreach($info as $v)
        <tr>
            <td>{{$v->g_id}}</td>
            <td>{{$v->g_name}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" alt="" width="100"></td>
            <td>{{$v->g_price}}</td>
            <td>{{$v->g_number}}</td>
            <td>@if($v->is_best==1)是 @else 否 @endif</td>
            <td>@if($v->is_new==1)是 @else 否 @endif</td>
            <td>@if($v->is_up==1)是 @else 否 @endif</td>
            <td>{{$v->cate_id}}</td>
            <td>{{$v->brand_id}}</td>
            <td><a href="{{url('goods/edit/'.$v->g_id)}}">编辑</a> <a href="{{url('goods/destroy/'.$v->g_id)}}">删除</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>