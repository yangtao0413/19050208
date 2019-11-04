<?php


Route::get('/', function () {
    return view('welcome');
});
//Route::请求方式(any get post)('请求的url','匿名函数或者控制响应@方法');
Route::get('student','StudentController@list');

Route::get('student/haha/{id}/{name}','StudentController@index');
Route::get('student/heihei/{id}/{name}',function($id,$name){
	echo "id=".$id;
	echo "name=".$name;
});

Route::get('/login',function(){
	return '<form action="adddo" method="post">'.csrf_field().'<input name="name" value=""><button>登录</button>';
});

Route::post('adddo',function(){
	$name = request()->name;
	session(['user'=>$name]);
	// dd($name);
});

//后台登录路由模块
    Route::get('login/login','login\LoginController@login');
    Route::post('login/login_do','login\LoginController@login_do');
	Route::any('login/index','login\LoginController@index');

//品牌模块
Route::prefix('/brand')->group(function () {
	Route::get('add', function (){
	    return view('brand/add');
	});
	Route::post('add_do','brand@add_do');
	Route::get('list','brand@lists');
	Route::get('edit/{id}','brand@edit');//编辑页面
	Route::post('update/{id}','brand@update');//执行页面
	Route::get('delete/{id}','brand@delete');//执行页面
});

//管理员模块
Route::prefix('/Admin')->middleware('checklogin')->group(function () {
	Route::get('create','Admin\Admin@create');
	Route::post('store','Admin\Admin@store');
	Route::get('index','Admin\Admin@index');
	Route::get('edit/{id}','Admin\Admin@edit');//编辑页面
	Route::post('update/{id}','Admin\Admin@update');//执行页面
	Route::get('delete/{id}','Admin\Admin@delete');//执行删除
	Route::post('checkname','Admin\Admin@checkname');//验证唯一
});

//分类模块
Route::prefix('/cate')->middleware('checklogin')->group(function(){
	Route::get('create','Admin\CateController@create');//添加
	Route::post('store','Admin\CateController@store');//执行添加
	Route::get('index','Admin\CateController@index');//展示
	Route::get('edit/{id}','Admin\CateController@edit');//修改
	Route::post('update/{id}','Admin\CateController@update');//执行修改
	Route::post('deletd','Admin\CateController@deletd');//删除
});

//商品模块
Route::prefix('goods')->middleware('checklogin')->group(function () {
    Route::get('create','Admin\Goods@create');
    Route::post('store','Admin\Goods@store');
    Route::get('index','Admin\Goods@index');
    Route::get('edit/{id}','Admin\Goods@edit');
    Route::post('update/{id}','Admin\Goods@update');
    Route::get('destroy/{id}','Admin\Goods@destroy');

});

Route::get('/login', function () {
    return '<form action="fromdo" method="post">'.csrf_field().'<input type="text" name="name" value=""><button>登录</button></form>';
});
Route::post('fromdo', function () {
	$name=request()->name;
	session(['user'=>$name]);
	// dd($name);
});
//测试
Route::prefix('/Andex')->middleware('checklogin')->group(function() {
		Route::get('create','Admin\Andex@create');
		Route::post('store','Admin\Andex@store');
		Route::get('index','Admin\Andex@index');
		Route::get('edit/{id}','Admin\Andex@edit');//编辑页面
		Route::post('update/{id}','Admin\Andex@update');//执行页面
		Route::post('delete','Admin\Andex@delete');//执行删除

		Route::post('checkname','Admin\Andex@checkname');//验证唯一
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//前台路由
Route::get('/', 'index\IndexController@index');
Route::get('/logins', 'index\LoginController@logins');
Route::post('/logindo', 'index\LoginController@logindo');
Route::get('/reg', 'index\LoginController@reg');
Route::any('/send', 'index\LoginController@send');
Route::any('/regdo', 'index\LoginController@regdo');
Route::any('/prolist/{id?}', 'index\IndexController@prolist');
Route::any('/proinfo/{id}', 'index\IndexController@proinfo');
Route::any('/success/{id}', 'index\IndexController@success');
Route::any('/address', 'index\IndexController@address');
Route::prefix('/cart')->group(function(){
    Route::post('/create','Index\CartController@create');
    Route::get('/index','Index\CartController@index');
});


Route::get('/adxin/index','index\AdxinController@index');
Route::get('/adxin/create/{id}', 'index\AdxinController@create');


//支付宝支付处理路由
Route::get('alipay','AlipayController@Alipay');  // 发起支付请求
Route::any('notify','AlipayController@AliPayNotify'); //服务器异步通知页面路径
Route::any('return','AlipayController@AliPayReturn');  //页面跳转同步通知页面路径
