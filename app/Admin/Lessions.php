<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lessions extends Model
{
    //定义关联表名
    protected $table = 'lessions';

    // 定义模型和属性的关联关系
    public function course(){
    		return $this -> hasOne('App\Admin\Course','id','course_id');
    }
}
