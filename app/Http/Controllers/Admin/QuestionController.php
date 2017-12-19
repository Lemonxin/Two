<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;
use Excel;
use Input;
class QuestionController extends Controller
{
    //列表显示
	public function index(){
    $data = Question::all();
    return view('admin.question.index',compact('data'));
  }

  // 导出方法
  public function export(){
  		$data = Question::all();
  		// 定制表头
  		$cellData[] = ['序号','题干','所属试卷','分值','选项','正确答案','添加时间'];
  		foreach ($data as $key => $value) {
  				 $cellData[] = [
  				 						$value -> id,
  				 						$value -> question,
  				 						$value -> paper -> paper_name,
  				 						$value -> score,
  				 						$value -> options,
  				 						$value -> answer,
  				 						$value -> created_at
  				 ];
  		}
  		
      // 创建excel文件（文件名，excel实例，需要使用的数据）
       Excel::create(sha1(time() . rand(1000,9999)),function($excel) use ($cellData){
            $excel->sheet('题库', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    // 导出
    public function import(){
      if(Input::method() == 'POST'){
          // 读取文件中的相关数据再去写入数据表
           $filePath = '.' . Input::get('excelfile');
           // dd($filePath);
           // 使用excel的loade方法载入文件
            Excel::load($filePath, function($reader) {
                $data = $reader->getSheer(0) -> toArray();  //获取当前文件中的第一个工作表中的数据
                // dd($data);
                // 进一步写入数据表
                foreach ($data as $key => $value) {
                  // 第一个记录是表头所以跳过
                  if($key == '0'){
                     continue;
                  }
                  // 对于记录进行处理
                  $cellData[] = [
                      'question'  =>  $value[0],   //题干
                      'paper_id'  =>  Input::get('paper_id'),  //试卷id
                      'score'     =>  $value[3],
                      'options'   =>  $value[1],
                      'answer'    =>  $value[2],
                      'created_at'=>  date('Y-m-d H:i:s')  //当前时间
                  ];
                }
                // 插入数据
                $rst = Question::insert($cellData);
                echo $rst ? '1' : '0';
            });
      }else{
          // 获取当前试卷的选项
          $paper = \App\Admin\Paper::all();
          return view('admin.question.import',compact('paper'));
      }
    }
}
