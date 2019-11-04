<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Andex as A;
use Validator;


class Andex extends Controller
{
    public function index(){
    	$where=[];        
        $name = request()->name;
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $data = A::where($where)->paginate(2);
        $query =request()->all();
        return view('Andex.index',['data'=>$data,'query'=>$query]);
    }

    public function create(){
    	return view('Andex.create');
    }

    public function store(Request $request){
    	$validator = \Validator::make($request->all(), [
               'name' => 'required|alpha_dash',
            'eamil' => 'required',
            ],[
                'name.required'=>'名称不能为空！',
                'name.alpha_dash'=>'名称由字母 数字，以及破折号和下划线组成',
                'eamil.required'=>'网址不能为空！',
                ]);
				if ($validator->fails()) {
              return redirect('Andex/create')
              ->withErrors($validator)
              ->withInput();
        }
        $post = $request->except('_token');
        //文件上传
        if(request()->hasFile('head')){
            $post['head']=$this->upliad('head');
        };
        $res = A::create($post);
        if($res){
            return redirect('Andex/index');
        }
    }
    public function edit($id){
		$data=A::find($id);
        return view('Andex/edit',['data'=>$data]);
    }

    public function update($id,Request $request){
    	
        $post = $request->except('_token');
        //文件上传
        if(request()->hasFile('head')){
            $post['head']=$this->upliad('head');
        };
        $res = A::where('index_id',$id)->update($post);
        
            return redirect('Andex/index');
       
    }

    public function delete(){
    	$id=request()->id;

        $res=A::where('index_id',$id)->delete();
        echo $res;
    
    }

     public function upliad($file)
    {
        if (request()->file($file)->isValid()) {
            $photo = request()->file($file);
            $store_result = $photo->store('uploads');
            
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    
    }
}
