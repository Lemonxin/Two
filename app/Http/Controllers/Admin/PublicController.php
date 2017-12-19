<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入auth门面
use Auth;

class PublicController extends Controller
{
    //展示登录页面
    public function login(){
    	// 带视图的响应
    	return view('admin.public.login');
    }

    //验证登陆表单
    public function checkLogin(Request $request){
    	// 1.自动验证
    	$this -> validate($request,[
    		// 用户名：必填，必须唯一，最少3位，最长20位，
    		'username'		=>	'required|min:3|max:20',
    		'password'		=>	'required|min:6|max:30',
    		'captcha'			=>	'required|size:5|captcha'
    	]);

    	// 获取用户名和密码
    	$data = $request -> only('username','password');
    	$data['status'] = '2';
    	// 测试是不是能够获取到
    	// dd($data);
    	// 开始用户信息的认证
    	$result = Auth::guard('admin') -> attempt($data,$request -> get('online'));
    	// dd($result);

    	// 跳转302的响应
    	if($result){
    		// 合法用户跳转到后台
            // dd($result); 
    		return redirect('/admin/index/index');
    	}else{
    		// 非法用户，跳转登陆界面
    		return redirect('/admin/public/login') -> withErrors(['loginError' => '用户名或密码错误']);
    	}
    }

    // 退出页面并且清除session
    public function logout(){
        // 使用Auth门面
        Auth::guard('admin') -> logout();
        // 跳转到登录页面
        return redirect('/admin/public/login');
    }
}
