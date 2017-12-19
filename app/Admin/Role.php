<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	 // 定义关联表名
    protected $table = 'roles';
    // 禁用时间字段
    public $timestamps = false;
    // assignAuth处理分配权限
    public function assignAuth($data){
				// auth_ids字段
    		$post['auth_ids'] = implode(',',$data['auth_id']);
    		// 查询auth表中对应的记录取出A和C做连接操作
    		$auth = Auth::where('pid','>','0') -> whereIn('id',$data['auth_id']) ->get();
    		$ac = '';
    		foreach ($auth as $key => $value) {
    			// 拼凑控制器和方法
    			$ac .= $value -> controller . '@' . $value -> action . ',';
    		}
    		// 去除结尾的逗号
    		$post['auth_ac'] = rtrim($ac,',');
    		// 修改保存操作
    		return Role::where('id','=',$data['id']) -> update($post);
    }
}
