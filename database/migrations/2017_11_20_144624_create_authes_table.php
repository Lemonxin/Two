<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('authes',function($table){
            $table -> increments('id');
            $table -> string('auth_name',20) -> notNull();
            $table -> string('controller',40);
            $table -> string('action',30);
            $table -> tinyInteger('pid');
            $table -> enum('is_nav',[1,2]) -> notNull() -> default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除表
        Schema::dropIfExists('authes');
    }
}
