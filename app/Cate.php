<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $primaryKey='cate_id';
    /**
	* 关联到模型的数据表
	** @var string
	*/
	protected $table = 'cate';

	/**
	* 表明模型是否应该被打上时间戳
	** @var bool
	*/
	public $timestamps = false;


    /**
	* 可以被批量赋值的属性. ** @var array
	*/
	protected $fillable = ['cate_name','parent_id','cate_showw'];
}
