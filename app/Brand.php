<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $primaryKey='brand_id';
    protected $table='brand';
    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['brand_id','brand_name','brand_url','brand_logo','is_show'];
    public $timestamps=false;
}
