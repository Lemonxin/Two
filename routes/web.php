<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// 一般情况下不需要也不能添加是否登陆验证，所以单独提取出来
		// 后台登陆页面的路由
		Route::get('/admin/public/login','Admin\PublicController@login') -> name('login');
		// 登陆表单的处理
		Route::post('/admin/public/checkLogin','Admin\PublicController@checkLogin');
		//定义退出路由
		Route::get('/admin/public/logout','Admin\PublicController@logout');


//定义后台路由组 
Route::group(['prefix' => 'admin','middleware' => ['auth:admin','checkrbac']],function(){

		// 展示后台的首页页面
		Route::get('index/index','Admin\IndexController@index');
		Route::get('index/welcome','Admin\IndexController@welcome');

		// 管理员管理模块相关的路由
		Route::get('admin/index','Admin\AdminController@index');
		Route::any('admin/add','Admin\AdminController@add');
		Route::get('admin/del','Admin\AdminController@del');
		Route::any('admin/edit','Admin\AdminController@edit');

		// 针对管理员列表的服务端分页   {mark?}是可选路由参数
		Route::get('admin/serverSide/{mark?}','Admin\AdminController@serverSide');

		// 权限管理的操作
		Route::any('auth/add','Admin\AuthController@add');   //(添加权限)
		Route::get('auth/index','Admin\AuthController@index');    //列表操作

		// 角色管理的操作
		Route::get('role/index','Admin\RoleController@index');   //角色列表
		Route::any('role/assign','Admin\RoleController@assign');   //权限分派

		// 会员管理路由
		Route::get('members/index','Admin\MembersController@index'); //列表页面
		Route::any('members/add','Admin\MembersController@add');  //添加操作
		Route::get('members/del','Admin\MembersController@del');  //删除操作
		Route::any('members/edit','Admin\MembersController@edit'); //修改操作
		Route::get('members/getAreasByPid','Admin\MembersController@getAreasByPid');  //ajax专用

		// 文件上传
		Route::post('uploader/webuploader','Admin\UploaderController@webuploader');
		Route::post('uploader/qiniu','Admin\UploaderController@qiniu');

		// 专业分类
		Route::get('protype/index','Admin\ProtypeController@index'); //专业分类列表
		Route::get('profession/index','Admin\ProfessionController@index'); //专业列表
		Route::any('profession/add','Admin\ProfessionController@add'); //专业添加

		// 课程点播和管理
		Route::get('course/index','Admin\CourseController@index');  //课程列表 
		Route::get('lessions/index','Admin\LessionsController@index');   //点播课程的展示页面 
		Route::get('lessions/play','Admin\LessionsController@play');    //播放视频

		// 关于试卷和试题的管理
		Route::get('paper/index/','Admin\PaperController@index');   //试卷首页
		Route::get('question/index','Admin\QuestionController@index');  //试题首页
		Route::get('question/export','Admin\QuestionController@export');  //导出
		Route::any('question/import','Admin\QuestionController@import');   //导入


		Route::get('stream/index','Admin\StreamController@index');
		Route::any('stream/add','Admin\StreamController@add');
		Route::get('live/index','Admin\LiveController@index');
});

// 定义前台路由
Route::get('/','Home\IndexController@index');
Route::get('/home/live','Home\LiveController@');