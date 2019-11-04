<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{

    public function index()
    {
        //当前用户ID
        $user_id=1;
        $cartinfo=Cart::where('user_id',$user_id)->join('goods', 'cart.g_id', '=', 'goods.g_id')->get();


        return view('index.cart',['cartinfo'=>$cartinfo]);
    }

    public function create()
    {
        $data=request()->all();
        $user_id=1;
        $data['user_id']=$user_id;
        $data['add_time']=time();
        $res=Cart::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
