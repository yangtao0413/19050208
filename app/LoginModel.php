<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    public $primaryKey='id';
    protected $table='login';
    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['name','pwd','email','add_time'];
    }
