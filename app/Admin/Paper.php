<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    //定义关联的数据表
    protected $table = 'paper';
    // 关联课程的方法
    public function course(){
    	return $this -> hasOne('App\Admin\Course','id','course_id');
    }
    
}
