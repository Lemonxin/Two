<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lessions;
use Input;

class LessionsController extends Controller
{
    //列表操作
    public function index(){
    	$data = Lessions::orderBy('sort','desc') -> get();
    	return view('admin.lessions.index',compact('data'));
    }

    public function play(){
    	// 获取视频的id值
    	$video_id = Input::get('id');
    	// 获取视频的播放地址
    	$video_addr = Lessions::where('id','=',$video_id) -> value('video_addr');
    	// 输出播放器
    	return "<video src = '$video_addr' controls = 'controls' width:'100%'>你的浏览器不支持video标签</video>";
    }
}
