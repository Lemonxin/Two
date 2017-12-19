<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Paper;

class PaperController extends Controller
{
    //列表操作
    public function index(){
    	 $data = Paper::all();
    	 return view('admin.paper.index',compact('data'));
    }
}
