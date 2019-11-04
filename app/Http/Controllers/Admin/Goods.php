<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\goods as good;

class Goods extends Controller
{
    public function index()
    {
        $info=good::all();
        return view('goods.index',['info'=>$info]);
    }

    public function create()
    {
      return view('goods.caeate');
    }

   
    public function store(Request $request)
    {
       $data=request()->except('_token');
        if(request()->hasFile('g_img')){
            $data['g_img']=$this->upload('g_img');
        }
        $res=good::create($data);
        if($res){
            return redirect('goods/index');
        }

    }
    /*
 * 文件上传*/

    public function upload($file){
        if (request()->file($file)->isValid()) {
            $photo = request()->file($file);
            $store_result = $photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
       $info=good::find($id);
       return view('goods.edit',['info'=>$info]);
    }

    
    public function update(Request $request, $id)
    {
        $data=request()->except('_token');
        $res=good::where('g_id',$id)->update($data);
            return  redirect('goods/index');
    }

   
    public function destroy($id)
    {
        $res=good::where('g_id',$id)->delete();
        if($res){
            return redirect('goods/index');
        }
    }
}
