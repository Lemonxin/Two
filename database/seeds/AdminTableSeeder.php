<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //循环生成100条管理员的数据
        //定义空数组，因为后面需要一个二维数组
        $data = [];
        // 创建facker实例（需要注意命名空间的问题）
        $faker = \Faker\Factory::create('zh_CN');
        for($i = 0; $i < 100; $i++){
        	// 每次生成一条数据
        	$data[]	=	[
        		// 对照数据表，确定需要的字段
        		'username'		=>	$faker -> userName, 		//生成用户名
        		'password'		=>	bcrypt('123456'), 			//生成密码,laravel框架生成密码
        		'gender'			=>	rand(1,2),
        		'mobile'			=>	$faker -> phoneNumber, //手机
        		'email'				=>	$faker -> email,  			//生成邮箱
        		'role_id'			=>	rand(1,5), //随机角色
        		'created_at'		=>	date('Y-m-d H:i:s'),		//创建时间
        		'status'			=>	rand(1,2),							//随机状态
        	];
        }
        // 一次性写入数据库，保证数据库是最优状态
        DB::table('admin') -> insert($data);
    }
}
