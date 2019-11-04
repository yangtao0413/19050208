<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Andex extends Model
{
    public $primaryKey='index_id';

    public $table = 'andex';
    
    protected $fillable = ['name','eamil','link','head','c_name','c_duce','sex'];


    public $timestamps = false;}
