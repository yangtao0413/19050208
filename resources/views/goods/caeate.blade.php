<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('goods/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="1">
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="g_name" style="width:249px;"></td>
        </tr>
        <tr>
            <td>商品价格</td>
            <td><input type="text" name="g_price" style="width:250px;"></td>
        </tr>
        <tr>
            <td>商品库存</td>
            <td><input type="text" name="g_number" style="width:250px;"></td>
        </tr>
        <tr>
            <td>商品详情</td>
            <td><textarea name="g_desc" id="" cols="36" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>商品图片</td>
            <td><input type="file" name="g_img"></td>
        </tr>
        <tr>
            <td>是否精品</td>
            <td><input type="radio" name="is_best" value="1" checked>是<input type="radio" name="is_best" value="2">否</td>
        </tr>
        <tr>
            <td>是否新品</td>
            <td><input type="radio" name="is_new" value="1"checked>是<input type="radio" name="is_new" value="2">否</td>
        </tr>
        <tr>
            <td>是否上架</td>
            <td><input type="radio" name="is_up" value="1"checked>是<input type="radio" name="is_up" value="2">否</td>
        </tr>
        <tr>
            <td>商品分类</td>
            <td><select name="cate_id" id="">
                    <option value="">--请选择--</option>
                    <option value="">服装鞋子</option>
                    <option value="">家具家电</option>
                    <option value="">手机平板</option>
                    <option value="">古董文玩</option>
                    <option value="">日用百货</option>
                </select></td>
        </tr>
        <tr>
            <td>商品品牌</td>
            <td><select name="brand_id" id="">
                    <option value="">--请选择--</option>
                    <option value="">华为</option>
                    <option value="">苹果</option>
                    <option value="">小米</option>
                    <option value="">vivo</option>
                    <option value="">OPPO</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="立即添加"></td>
            <td><center><a href=""><button style="background:forestgreen">添加分类</button></a>&nbsp;&nbsp;<a href=""><button style="background:gold">添加品牌</button></a></center></td>
        </tr>
    </table>
</form>
</body>
</html>