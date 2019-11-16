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
            'name'=> '小島祐樹',
            'employee'=>'2317',
            'email'=>'ozima@mail',
            'password'=>bcrypt('ozima'),
            'role'=>'admin',
            'team'=>'人事チーム',
            'join'=>'2015/04/01',
        ]);    
            //従業員1 id=2
        \App\User::create([
            'name'=> '井上薫',
            'employee'=>'1010',
            'email'=>'inoue@mail',
            'password'=>bcrypt('inoue'),
            'role'=>'worker',
            'team'=>'製造チーム',
            'join'=>'2015/04/01',
        ]);
        \App\Routine::create([
            'users_id'=>2,
            'jobname'=> 'パイプ洗浄',
            'set'=>'1セット',
            'settime'=>'15分',
            'content'=>'パイプつけ洗い',
            'important'=>'毎日',
        ]);
    }
}
