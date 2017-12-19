<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

// 引入系统已经给实现好的接口方法文件空间
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义表名
    protected $table = 'admin';
    // 使用trait代码段
    use Authenticatable;
    // 此处定义与角色之间的一对一关系
    public function roles(){
    	return $this -> hasOne('App\Admin\Role','id','role_id');
    }
}
