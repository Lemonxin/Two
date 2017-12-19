<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建表
        Schema::create('profession',function($table){
            $table -> increments('id');
            $table -> string('pro_name',20) -> notNull();
            $table -> tinyInteger('protype_id') -> notNull();
            $table -> string('teachers_ids') -> notNull();
            $table -> string('description');
            $table -> string('cover_img');
            $table -> integer('view_count') -> notNull() -> default('500');
            $table -> timestamps();
            $table -> tinyInteger('sort') -> notNull() -> default('0');
            $table -> tinyInteger('duration');
            $table -> decimal('price',7,2);
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
        Schema::dropIfExists('profession');
    }
}
