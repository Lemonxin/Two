<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     //定义关联的数据表
    protected $table = 'question';
    // 关联课程的方法
    public function paper(){
    	return $this -> hasOne('App\Admin\Paper','id','paper_id');
    }
}
