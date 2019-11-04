<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
    	echo "你好，laravel框架";
    }

    public function index($id,$name){
    	echo $id;

    	echo $name;
    }
}
