<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入模型
use App\Admin\Members;
use DB;
use Input;

class MembersController extends Controller
{
    //列表
    public function index(){
    		$data = Members::all();
    		return view('admin.members.index',compact('data'));
    }

    public function add(){
        //判断请求类型 
        if(Input::method() == 'POST'){
            // 处理(先排除以下三个)
            $data = Input::except('uploadfile','file-2','_token','file');
            // 补充数据
            $data['password']   = bcrypt('password');
            $data['created_at'] = date('Y-m-d H:i:s');
            // 写入数据，DB，门面都可以
            $result = Members::insert($data);
            // 转化bool类型
            return $result ? '1' : '0';
        }else{
            // 查询国家视图然后传给视图
            $country = DB::table('area') -> where('pid','0') -> get();
            return view('admin.members.add',compact('country'));
        }
    }

    // 根据地区pid获取其下属内容
    public function getAreasByPid(){
        // 获取pid
        $pid = Input::get('pid');
        // 查询
        $data = DB::table('area') -> where('pid',$pid) -> get();
        // 编码处理
        return response() -> json($data);
    }
}
