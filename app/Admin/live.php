<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class live extends Model
{
    //定义表
    protected $table = 'live';

    // 关联专业
    public function profession(){
    	return $this -> hasOne('App\Admin\Profession','id','profession_id');
    }

    // 关联流
    public function stream(){
    	return $this -> hasOne('App\Admin\Stream','id','stream_id');
    }
}
