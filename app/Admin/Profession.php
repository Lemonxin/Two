<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
     //定义数据表名
    protected $table = 'profession';

    // 定义与专业分类的关联关系
    public function protype(){
    	return $this -> hasOne('App\Admin\Protype','id','protype_id');
    }


}
