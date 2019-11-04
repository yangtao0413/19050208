<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin as A;

class Admin extends Controller
{
    
     //列表展示

    public function index()
    // session(['age'=>18]);
    {
                $where=[];
        $keys = request()->keys;
        $page = request()->page;
        $keyval = request()->keyval;
        if($keys){
            $where[]=[$keys,'=',$keyval];
        }
        $name = request()->name;
        if($name){
            $where[]=['name','like',"%$name%"];
        }$data = cache('admins_'.$page);
        dump($data);
        if(!$data){
        $pagesize = config('app.pageSize');
        $data = A::where($where)->paginate($pagesize);
        cache(['admins_'.$page=>$data],30*24*60);
        }

        // dd($data);
        $query =request()->all();
        return view('Admin.index',['data'=>$data,'query'=>$query]);
    }

   
     //添加页面

    public function create()
    {
        return view('Admin/create');    
    }

   
     //执行添加

    public function store(Request $request)
    //第二种验证
    // public function store(\App\Http\Requests\StoreAdminPost $request)
    {
        //第一种验证
        // $validatedData = $request->validate([
        //     'name' => 'required|alpha_dash|min:2|max:10',
        //     'pwd' => 'required',
        //     ],[
        //         'name.required'=>'管理员名称不能为空！',
        //         'name.alpha_dash'=>'管理员名称由字母 数字，以及破折号和下划线组成',
        //         'name.min'=>'管理员名称最少2位',
        //         'name.max'=>'管理员名称最多10位',
        //         'pwd.required'=>'密码不能为空！',
        //     ]);
        

        //第三种验证
        $validator = \Validator::make($request->all(), [
               'name' => 'required|alpha_dash|min:2|max:10',
            'pwd' => 'required',
            ],[
                'name.required'=>'管理员名称不能为空！',
                'name.alpha_dash'=>'管理员名称由字母 数字，以及破折号和下划线组成',
                'name.min'=>'管理员名称最少2位',
                'name.max'=>'管理员名称最多10位',
                'pwd.required'=>'密码不能为空！',
            ]);
        if ($validator->fails()) {
              return redirect('Admin/create')
              ->withErrors($validator)
              ->withInput();
        }
        $post = $request->except('_token');
        $post['add_time'] = time();
        //文件上传
        if(request()->hasFile('head')){
            $post['head']=$this->upliad('head');
        };
        $res = A::create($post);
        if($res){
            return redirect('Admin/index');
        }

    }

   
     //显示详情

    public function show($id)
    {
        //
    }

    
     //编辑页面

    public function edit($id)
    {
        $data=A::find($id);
        return view('Admin/edit',['data'=>$data]);
    }

   
     //执行编辑

    public function update(Request $request, $id)
    {
        //第三种验证
        $validator = \Validator::make($request->all(), [
               'name' => 'required|alpha_dash|max:12|min:2|unique:admin',
                // 'pwd' => 'required|alpha_num|digits_between:6,12',
                // 'repwd'=>'same:pwd',
                'email'=>'required|email',
                'tel'=>'required',
                'head'=>'image',
            ],[
                 'name.required'=>'管理员名称不能为空！',
                'name.alpha_dash'=>'管理员名称由字母 数字，以及破折号和下划线组成',
                'name.min'=>'管理员名称最少2位',
                'name.max'=>'管理员名称最多12位',
                'name.unique'=>'用户名已有人使用',
                'email.required'=>'邮箱不能为空',
                'email.email'=>'格式必须为邮箱',
                'tel.required'=>'电话不能为空',
                // 'pwd.required'=>'密码不能为空！',
                // 'pwd.alpha_dash'=>'密码名称由字母 数字，以及破折号和下划线组成',
                // 'pwd.digits_between'=>'密码需由6-12位组成',
                // 'repwd.same'=>'密码必须保持一致',
                'head.image'=>'头像必须为图片',]);
        if ($validator->fails()) {
              return redirect('Admin/edit/',$id)
              ->withErrors($validator)
              ->withInput();
        }
        $post = $request->except('_token');
        //文件上传
        if(request()->hasFile('head')){
            $post['head']=$this->upliad('head');
        };
        $res = A::where('admin_id',$id)->update($post);
        if($res){
            return redirect('Admin/index');
        }
    }

  
     //执行删除

    public function delete($id)
    {
        if(!$id)
        {
            return;
        }
        $res = A::where('admin_id',$id)->delete($post);
        if($res)
        {
            return redirect('/Admin/index');
        }
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


    public function checkname(){
        $name = request()->name;

        if($name){
            $where['name']=$name;
        }
       $count= A::where($where)->count();

       echo $count;
    }
}
