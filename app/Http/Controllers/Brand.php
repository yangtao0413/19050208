<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Brand extends Controller
{
    public function add_do()
    {
    	//接收post所有值
    	//$post=request()->post();
    	$post=request()->except(['_token']);
    	// $post=request()->only(['brand_name','brand_url','brand_logo','is_show']);
    	// dump($post);
    	//单个接值
    	// $brand_name = request()->input('brand_names');
    	// dd($brand_name);
    	// dd($post);
    	
    	//文件上传
    	if(request()->hasFile('brand_logo')){
    		$post['brand_logo']=$this->upliad('brand_logo');
    	};
    	// dd($post);
    	//DB入库
    	$res=DB::table('brand')->insert($post);
    	// $res=DB::table('brand')->insertGetId($post);


    	if($res){
	    	return redirect('/brand/list');
    	}
    	//dd($res);
    }

	/*
		文件上传
	 */
    public function upliad($file)
    {
		if (request()->file($file)->isValid()) {
			$photo = request()->file($file);
			$store_result = $photo->store('uploads');
			
			return $store_result;
		}
		exit('未获取到上传文件或上传过程出错');
	
    }



    public function lists()
    {
    	//db 查询
    	$data = DB::table('brand')->get()->toArray();
    	// db 查询单条
    	//$data = DB::table('brand')->select('brand_name')->first();
    	//dd($data);
    	
    	return view('brand.list',['data'=>$data]);
    }


    public function edit($id)
    {
    	//根据主键id查询记录
    	
    	$data = DB::table('brand')->where(['brand_id'=>$id])->first();
    	return view('brand.edit',['data'=>$data]);
    }

    public function update($id)
    {
   		//echo $id;
    	$post=request()->except(['_token']);

    	//文件上传
    	if(request()->hasFile('brand_logo')){
    		$post['brand_logo']=$this->upliad('brand_logo');
    	};

   		$res = DB::table('brand')
				->where('brand_id',$id)
				->update($post);

		if($res){
			return redirect('/brand/list');
		}
    }


    public function delete($brand_id)
    {
    	if(!$brand_id)
    	{
    		return;
    	}
    	$res=DB::table('brand')->where('brand_id',$brand_id)->delete();
    	if($res)
    	{
			return redirect('/brand/list');
    	}
    }
}

