@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">项目后台</div>
            <table border="1" style="text-align:center">
            <tr>
                <td>分类</td>
                <td>管理员</td>
                <td>品牌</td>
                <td>商品</td>
            </tr>
            <tr>
                <td><a href="{{url('/cate/create')}}">分类添加</a></td>
                <td><a href="{{url('/Admin/create')}}">管理员添加</a></td>
                <td><a href="{{url('/brand/add')}}">品牌添加</a></td>
                <td><a href="{{url('/goods/create')}}">商品添加</a></td>
            </tr>
            <tr>
                <td><a href="{{url('/cate/index')}}">分类列表</a></td>
                <td><a href="{{url('/Admin/index')}}">管理员列表</a></td>
                <td><a href="{{url('/brand/list')}}">品牌列表</a></td>
                <td><a href="{{url('/goods/index')}}">商品列表</a></td>
            </tr>
        </table>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    您已登录！
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
