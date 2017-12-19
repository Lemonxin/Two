<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建数据表
        Schema::create('admin',function(Blueprint $table){
            // 设计字段（查看字典）
            $table -> increments('id');      //自增id
            $table -> string('username',20) -> notNull();   //用户名字段
            $table -> string('password') -> notNull();  //密码字段
            $table -> enum('gender',['1','2','3']) -> default('1');   //性别字段
            $table -> string('mobile',11);  //手机号字段
            $table -> string('email',50);  //邮箱
            $table -> tinyInteger('role_id');  //角色id
            $table -> timestamps();//添加created_at和update_at字段【datetime类型】
            $table -> rememberToken(); //记住登陆功能需要的字段
            $table -> enum('status',['1','2']) -> default('2');//账号状态，默认启动

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除数据表
        Schema::dropIfExists('admin');
    }
}
