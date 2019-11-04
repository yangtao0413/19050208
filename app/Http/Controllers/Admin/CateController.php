<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pagesize=config('app.pageSize');
        // $data=Cate::paginate($pagesize);
        $cateInfo=Cate::all();
        
        $data=$this->getCateInfo($cateInfo);
        return view('cate.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateInfo=Cate::all();
        // dd($cateInfo);
        $Info=$this->getCateInfo($cateInfo);
        // dd($Info);
        return view('cate.create',['Info'=>$Info]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except(['_token']);
        $res=Cate::create($post);
        if($res){
            return redirect('cate/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Cate::find($id);
        $cateInfo=Cate::all();
        // dd($cateInfo);
        $Info=$this->getCateInfo($cateInfo);
        return view('Cate.edit',['data'=>$data,'Info'=>$Info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post = $request->except(['_token']);
         $res=Cate::where('cate_id',$id)->update($post);
            return redirect('cate/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function deletd()
    {
      $cate_id=request()->cate_id;
       $count=cate::where('parent_id',$cate_id)->count();
       if($count==0){
           $res=cate::where('cate_id',$cate_id)->delete();
           echo 1;
       }elseif($count>0){
           echo 2;
       }
    }

    function getCateInfo($cateInfo,$parent_id=0,$level=1){
    static $info=[];
    foreach($cateInfo as $k=>$v){
        if($v['parent_id']==$parent_id){
            $v['level']=$level;
            $info[]=$v;
            $this->getCateInfo($cateInfo,$v['cate_id'],$level+1);
        }
    }
    return $info;
}
}
