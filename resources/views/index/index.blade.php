@extends('layouts.shop')
@section('title','商城首页')
@section('content')
     <div class="head-top">
      <img src="/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="prolist.html"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url('/logins')}}">登录</a></li>
      <li><a href="{{url('/reg')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
    <div id="sliderA" class="slider">
      <img src="/index/images/image1.jpg" />
      <img src="/index/images/image2.jpg" />
      <img src="/index/images/image3.jpg" />
      <img src="/index/images/image4.jpg" />
      <img src="/index/images/image5.jpg" />
     </div><!--sliderA/-->
          <ul class="pronav">
      <li><a href="{{url('/prolist/')}}">服装鞋子</a></li>
      <li><a href="{{url('/prolist')}}">家电</a></li>
      <li><a href="{{url('/prolist')}}">手机平板</a></li>
      <li><a href="{{url('/prolist')}}">日用品</a></li>
      <li><a href="{{url('/prolist')}}">图书</a></li>
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     
    
     
     <div class="prolist">
     @foreach($goodsInfo as $v)
      <dl>
       <dt><a href="{{url('/proinfo/'.$v->g_id)}}"><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="100" height="100"></a></dt>
       <dd>
        <h3><a href="proinfo.html">{{$v->g_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->g_price}}</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$v->g_num}}</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
     @endforeach
     </div><!--prolist/-->
            @include('public.footer')
 @endsection
