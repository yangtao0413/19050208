@extends('layouts.shop')
@section('title','商城注册')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>商阁注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="index/images//head.jpg" />
     </div><!--head-top/-->
     <form action="{{ 'regdo' }}" method="post" class="reg-login">
     @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('/logins')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" /> <button id="yz" type="button" onclick="buttonAction();return false">获取验证码</button></div>
            <div>
            <span id="spanb"> </span>
            </div>
       <div class="lrList"><input type="text" name="password" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="passwords" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
       @include('public.footer')
    <script src="{{asset('/index/js/jquery.min.js')}}"></script>
        
       <script>
  // 发送邮件、获取验证码
  $('#yz').click(function(){
    var email=$('input[name=email]').val();
//     alert(email);
    $('input[name=email]').next().empty();
    if(email==''){
      $('input[name=email]').after("<span style='color:red'>注册邮箱不能为空！</span>");
      return false;
    }
    var btn = $("#yz");
          $(function() {
            btn.click(settime);
         })


         var countdown = 5;
        function settime() {
          if (countdown == 0) {
            btn.attr("disabled", false);
            btn.html("获取验证码");
            btn.removeClass("disabled");
            countdown = 5;
            return;
          } else {
            btn.addClass("disabled");
            btn.attr("disabled", true);
            btn.html("重新发送(" + countdown + ")");
            countdown--;
          }
          setTimeout(settime, 1000);
        }
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    });
    alert(email);
    $.post(
      "{{url('send')}}",
        {email:email},
      function(res){ 
        if (res['code']==1){
            alert(res['font'])
        }else{
            alert(res['font'])
        };
      }
    );
    return false;
  })
  //验证验证码
  $('input[name=code]').blur(function(){
    var code=$(this).val(); 
    var reg=/^\d{6}$/;
    $(this).next('spanb').empty();
    if(code==''){
      $('#spanb').html("<span style='color:red'>验证码不能为空！</span>");
      return false;  
    }else if(!reg.test(code)){
      $('#spanb').html("<span style='color:red'>验证码格式不对！</span>");
      return false;
    }else{
      $('#spanb').html("<span style='color:green'>验证码格式正确！</span>");
    }
  })
</script>
      @endsection
   
     