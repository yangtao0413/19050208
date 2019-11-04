<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $primaryKey='g_id';
    protected $table='goods';
    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['g_name','g_price','g_img','g_number','is_best','is_new','is_up','cate_id','brand_id'];
    public $timestamps=false;
}
