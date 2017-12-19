<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页方法index
   	public function index(){
   		// 展示视图
   		return view('admin.index.index');
   	}

   	// welcome框架页面的方法
   	//首页方法index
   	public function welcome(){
   		// 展示视图
   		return view('admin.index.welcome');
   	}
}
