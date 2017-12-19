<?php

use Illuminate\Database\Seeder;

class LessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessions') -> insert([
				    'lession_name'		=>		'liunx发展史',
				    'course_id'			=>		'1',
				    'video_addr'		=>		'/demo.mp4',
				    'created_at'		=>		date('Y-m-d H:i:s'),
				    'video_time'		=>		86400,
				]);
				DB::table('lessions') -> insert([
				    'lession_name'		=>		'虚拟机安装',
				    'course_id'			=>		'1',
				    'video_addr'		=>		'/demo.mp4',
				    'created_at'		=>		date('Y-m-d H:i:s'),
				    'video_time'		=>		86400,
				]);
				DB::table('lessions') -> insert([
				    'lession_name'		=>		'jQuery事件编程',
				    'course_id'			=>		'2',
				    'video_addr'		=>		'/demo.mp4',
				    'created_at'		=>		date('Y-m-d H:i:s'),
				    'video_time'		=>		86400,
				]);
				DB::table('lessions') -> insert([
				    'lession_name'		=>		'九大选择器',
				    'course_id'			=>		'2',
				    'video_addr'		=>		'/demo.mp4',
				    'created_at'		=>		date('Y-m-d H:i:s'),
				    'video_time'		=>		86400,
				]);
    }
}
