<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 确保模型已经定义，然后引入模型
use App\Admin\Admin;
use Input;
class AdminController extends Controller
{
    //列表显示
    public function index(){
    	// 获取数据
			$data = Admin::all();
    	return view('admin.admin.index',compact('data'));
    }

    // serverSide展示服务端分页
     public function serverSide($mark = ''){
     	// 判断是否是ajax请求
        // dd(response()->json('recordsTotal')); 
     	if($mark == 'isAjax'){
            // 接收一下排序的参数
            $orderByIndex = Input::get('order.0.column');  //接收排序【order.0.cloumn】元素的值
            $orderRule = Input::get('order.0.dir');  //获取【order.0.dor】的元素的值
            // 定义DT索引与字段的关系映射
            $_map = [
                1   =>  'id',
                2   =>  'username',
                3   =>  'mobile',
                4   =>  'email',
                5   =>  'role_id',
                6   =>  'created_at',
                7   =>  'status'
            ];
            $orderByFieldName = $_map[$orderByIndex];  //获取字段名
            // 接收分页参数
            $start  = Input::get('start');  //起始位置
            $length = Input::get('length'); //偏移量
            // 获取搜索的关键词
            $keyword = Input::get('search.value');
            
     		// ajax请求
     		return response() -> json([
     				'draw'					=>	(int) Input::get('draw'), //请求计数器
     				'recordsTotal'			=>	Admin::count(), //数据表中总的记录数
     				'recordsFiltered'		=>	Admin::where('username','like',"%$keyword%") -> count(), //被过滤之后的记录
     				'data'					=>	Admin::orderBy($orderByFieldName,$orderRule) -> offset($start) -> limit($length) -> where('username','like',"%$keyword%") -> get()  //查询到的数据对象
     		]); 
     	}else{
    		return view('admin.admin.serverSide');
    	}
    }

}
