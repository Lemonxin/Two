<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class UploaderController extends Controller
{
    // webuploader方法
    public function qiniu(Request $request){
    		// 对于上传文件的处理
    		// 1.判断是否有文件上传成功
    		if($request -> hasFile('file') && $request -> file('file') -> isValid()){
    			// 2.重命名文件
    			$filename = sha1($request -> file('file') -> getClientOriginalName() . time() . rand(1000,9999)) . '.' . $request -> file('file') -> getClientOriginalExtension();
    			// 3.保存上传文件(获取临时文件路径)
    			Storage::disk('qiniu') -> put($filename,file_get_contents($request -> file('file') -> path()));
    		// 4.给ajax一个响应应答
    			return response() -> json([
    					'errorCode'  =>  '0',
    					'message'	 =>  '文件上传成功',
    					'path'		 =>  Storage::disk('qiniu')->getDriver()->downloadUrl($filename)                //获取下载地址
    			]);
    		}else{
    			// 4.给ajax一个响应应答
    			return response() -> json([
    					'errorCode'  => '1',
    					'meaaage'		 => $request -> file('file') -> getErrorMessage,
    			]);
    		}
    }
}
