  <!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>三级分销</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/css/style.css" rel="stylesheet">
    <link href="/index/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     
      <div id="sliderA" class="slider">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo['g_img']}}" width="100">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo['g_img']}}" width="100">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo['g_img']}}" width="100">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo['g_img']}}" width="100">
     </div><!--sliderA/-->
    
     <table class="jia-len">
      <tr>
       <th><strong class="orange">{{$goodsInfo['g_price']}}</strong></th>
       <td>
        <button style="width:25px;height:25px;"><b>+</b></button>
        <input type="text" value="1" id="number" style="width:30px;text-align:center;">
        <button style="width:25px;height:25px;"><b>-</b></button>
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$goodsInfo['g_name']}}</strong>
        <p class="hui">富含纤维素，平衡每日膳食</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
    <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;"></a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/--> 
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo['g_img']}}" width="600" height="800">
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="javascript:;" id="cart" goods_id="{{$goodsInfo->g_id}}">加入购物车</a></td>
      </tr>
     </table>
    </div><!--maincont-->
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <!--焦点轮换-->
    <script src="/index/js/jquery.excoloSlider.js"></script>
    <script>
    $(function () {
     $("#sliderA").excoloSlider();
    });
  </script>
     <!--jq加减-->
    <script src="/index/js/jquery.spinner.js"></script>
   <script>
  $('.spinnerExample').spinner({});
  </script>
  </body>
</html>
{{--<script src="/index/js/jquery.js"></script>--}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        } });
    $(function(){
        $(document).on('click','#cart',function(){

            var _this=$(this);
            var goods_id=_this.attr('goods_id');

            var cart_number=$('#number').val();

            $.post(
                    "{{url('/cart/create')}}",
                    {g_id:goods_id,buy_number:cart_number},
                    function(res){
                        console.log(res);
                    }
            )

        })
    })
</script>