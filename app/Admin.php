<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $primaryKey='admin_id';

    public $table = 'admin';

    /*
    *可以被批量赋值的属性.** @var array
     */
    
    protected $fillable = ['name','pwd','head','tel','email','sex','add_time'];


    public $timestamps = false;

}
