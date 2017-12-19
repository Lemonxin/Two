<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入Role模型或者DB都可以
use App\Admin\Role;
use Input;
class RoleController extends Controller
{
    //实现视图展示并且携带数据
    public function index(){
    		// 获取数据
    		$data = Role::all();
    		// 展示视图
    		return view('admin.role.index',compact('data'));
    }

    //角色权限分配方法
    public function assign(){
        
        if(Input::method() == 'POST'){
            // 处理
            $data = Input::except('_token');
            // 实例化模型
            $role = new Role();
            // 调用自定义模型中的方法实现数据的保存（修改）
            // 返回返回值(收到影响的行数)
            return $role -> assignAuth($data); 
        } else{
            // 获取全部的顶级权限
            $top = \App\Admin\Auth::where('pid','=','0') -> get();
            // 获取非顶级权限
            $category = \App\Admin\Auth::where('pid','!=','0') -> get();    
            // 获取当前权限已经具备的权限
            $roleAuth = Role::where('id','=',Input::get('id')) -> value('auth_ids');
            return view('admin.role.assign',compact('top','category','roleAuth'));
        }
    }
}
