<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    //首页方法
    public function index(){
    	// 查询直播的数据（live）
    	$live = DB::table('live') -> where('status','1') -> get();
    	// 判断直播状态
    	foreach ($live as $key => $value) {
    		// 判断状态
    		if(time() > $value -> end_at){
    			// 已结束
    			$value -> liveStatus = '直播已结束';
    		}elseif($value-> begin_at < time() && time() < $value -> end_at){
    			$value -> liveStatus = '正在直播中';
    		}else{
    			$value -> liveStatus = '直播未开始';
    		}
    	}

// 获取专业相关的数据
		$professipn = DB::table('profession') -> orderBy('sort','desc') -> get();
    	return view('home.index.index',compact('live','profession'));
    }
}

