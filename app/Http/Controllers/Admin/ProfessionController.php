<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Profession;
use Input;

class ProfessionController extends Controller
{
   // 列表方法
  public function index(){
	   	// 获取数据
	   	$data = Profession::orderBy('sort','desc') -> get();
	   	// 展示视图文件
	   	return view('admin.profession.index',compact('data'));
   }

 //添加操作
  public function add(){
  	//判断请求类型
  	if(Input::method() == 'POST'){
  		//接收数据
  		$data = Input::except('_token');
  		//转化老师id
  		$data['teachers_ids'] = implode(',',$data['teacher_id']);
  		unset($data['teacher_id']);
  		$data['created_at'] = date('Y-m-d H:i:s');
  		//写入数据
  		$result = Profession::insert($data);
  		// return $result ? '1' : '0';
  	}else{
  		//获取分类的数据
    	$protype = \App\Admin\Protype::all();
    	//获取老师信息
    	$teachers = \App\Admin\Members::where('type','=','2') -> limit(10) -> get();
    	//展示视图
    	return view('admin.profession.add',compact('protype','teachers'));
  	}
  }
}
