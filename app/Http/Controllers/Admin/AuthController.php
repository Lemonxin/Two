<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
// 引入模型文件
use App\Admin\Auth;
class AuthController extends Controller
{
    //权限添加
    public function add(){
    	// 请求类型判断
    	if(Input::method() == 'POST'){
    		// 写一些必要的验证
    		$result = Auth::insert(Input::except('_token'));
    		// 需要返回添加结果
    		return $result ? '1' : '0';
    	}else{
    		//获取顶级权限
    		$parents = Auth::where('pid','0') -> get();
    		// 展示视图
    		return view('admin.auth.add',compact('parents'));
    	}
    }

    // 权限列表
    public function index(){
        $data = Auth::all();
        return view('admin.auth.index',compact('data'));
    }
}
