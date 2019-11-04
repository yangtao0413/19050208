<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Cate;
use Mail;


class IndexController extends Controller
{
    public function index(){
        $goodsInfo = Goods::all();
        $data = Cate::where("parent_id",0)->get();
        // dd($data);die;
    	return view('index.index',['goodsInfo'=>$goodsInfo]);
    }

    public function prolist($id=''){

        if(!empty($id)){
                    $cateinfo = Cate::all();
            $cate_id=$this->getCateId($cateinfo,$id);
            $data = Goods::wherein('cate_id',$cate_id)->get();
        }else{
            $data = Goods::get();
        }
        return view('index.prolist',['data'=>$data]);
    }

    public function proinfo($id){
        
       $goodsInfo = Goods::where('g_id',$id)->first();
        return view('index.proinfo',['goodsInfo'=>$goodsInfo]);
    }   

    public function success(){
        return view('index.success');
    }
    public function address(){
        return view('index.address');
    }

    public function sendemail(){
        $email =  '1624530554@qq.com';
        $code = rand(100000,999999);
        $this->send($email,$code);
        
    }
    public function send($email,$code){
        \Mail::send('email',['name'=>$code] ,function($message)use($email){
        //设置主题
            $message->subject("标题");
        //设置接收方
            $message->to($email);
        });
}
public  function getCateId($cateInfo,$parent_id){
    static $cate_id=[];
            $cate_id[$parent_id]=$parent_id;
    foreach($cateInfo as $k=>$v){
        if($v['parent_id']==$parent_id){
            $cate_id[$v['parent_id']]=$v['parent_id'];
            $this->getCateId($cateInfo,$v['cate_id']);
        }
    }
    return $cate_id;
}
}
