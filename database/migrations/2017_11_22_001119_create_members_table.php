<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('members',function($table){
            $table -> increments('id'); 
            $table -> string('username',20) -> notNull();
            $table -> string('password') -> notNull();
            $table -> enum('gender',[1,2,3]) -> nutNull() -> default('1');
            $table -> string('mobile',11);
            $table -> string('email',40);
            $table -> string('avatar');
            //针对四级联动需要地址的存储字段
            $table -> integer('country_id');//国际
            $table -> integer('province_id');//省份、州
            $table -> integer('city_id');//城市
            $table -> integer('county_id');//县
            $table -> timestamps();
            $table -> rememberToken();
            $table -> enum('type',[1,2]) -> notNull() -> default('1');
            $table -> enum('status',[1,2]) -> notNull() -> default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删表
        Schema::dropIfExists('members');
    }
}
