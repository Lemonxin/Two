<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course') -> insert([
		    'course_name'		=>		'linux',
		    'profession_id'		=>		'2',
		    'cover_img'			=>		'/cover.jpg',
		    'created_at'		=>		date('Y-m-d H:i:s'),
		]);
		DB::table('course') -> insert([
		    'course_name'		=>		'jQuery',
		    'profession_id'		=>		'3',
		    'cover_img'			=>		'/cover.jpg',
		    'created_at'		=>		date('Y-m-d H:i:s'),
		]);
		DB::table('course') -> insert([
		    'course_name'		=>		'ThinkPHP',
		    'profession_id'		=>		'2',
		    'cover_img'			=>		'/cover.jpg',
		    'created_at'		=>		date('Y-m-d H:i:s'),
		]);
		DB::table('course') -> insert([
		    'course_name'		=>		'laravel',
		    'profession_id'		=>		'2',
		    'cover_img'			=>		'/cover.jpg',
		    'created_at'		=>		date('Y-m-d H:i:s'),
		]);
    }
}
