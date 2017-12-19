<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Live;
use Input;

class LiveController extends Controller
{
    //直播播放页面
    //
    public fuction index(){
    		$url = '';
   			$data = Live::find(Input::get('id'));
   			$url .= $data -> stream -> stream_name;

   			// 展示页面
   			return view('home.index.live',compact('url','data')); 
    }
}
