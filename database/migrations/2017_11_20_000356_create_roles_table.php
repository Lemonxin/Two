<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('roles',function($table){
            // 设计数据表的字段
            $table -> increments('id');
            $table -> string('role_name',20) -> notNull();
            $table -> text('auth_ids');
            $table -> text('auth_ac');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除
        Schema::dropIfExists('roles');
    }
}
