<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Stream;

class StreamController extends Controller
{
    //列表
    public function index(){
    		$data = Stream::all();
    		return view('admin.stream.index',compact('data'));
    }

    public function add(){
    // 	if(){
    // 		$data = Input::except('_token');
    // 		$method = 'POST';
    // 		$path = '';
    // 	}else{
    		return view('admin.stream.add');
    	// }
    }
}
