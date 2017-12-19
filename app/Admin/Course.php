<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //定义管理的表
    protected $table = 'course';

    //定义与专业相关的关系
    public function profession(){
    	return $this -> hasOne('App\Admin\Profession','id','profession_id');
    }
}
