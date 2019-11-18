<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            //管理者
            'name'=> '管理者',
            'employee'=>'4587',
            'email'=>'admin@mail',
            'password'=>bcrypt('adminadmin'),
            'role'=>'admin',
            'team'=>'人事チーム',
            'join'=>'2015/04/01',
        ]);    
            //従業員1 id=2
        \App\User::create([
            'name'=> '従業員1',
            'employee'=>'1010',
            'email'=>'worker1@mail',
            'password'=>bcrypt('workwork1'),
            'role'=>'worker',
            'team'=>'製造',
            'join'=>'2016/04/01',
        ]);
        \App\Routine::create([
            'users_id'=>2,
            'jobname'=> '仕事1',
            'set'=>'1セット',
            'settime'=>'15分',
            'content'=>'仕事の詳細',
            'important'=>'毎日',
        ]);
            //従業員2 id=3
        \App\User::create([
            'name'=> '従業員2',
            'employee'=>'2010',
            'email'=>'worker2@mail',
            'password'=>bcrypt('workwork2'),
            'role'=>'worker',
            'team'=>'開発',
            'join'=>'2017/04/01',
        ]);
        \App\Routine::create([
            'users_id'=>3,
            'jobname'=> '商品開発',
            'set'=>'',
            'settime'=>'所定時間まで',
            'content'=>'開発詳細',
            'important'=>'毎日',
        ]);
    }
}
