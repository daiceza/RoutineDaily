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
            'name'=> '小島祐樹',
            'employee'=>'2317',
            'email'=>'ozima@mail',
            'password'=>bcrypt('ozima'),
            'role'=>'admin',
        ]);
    }
}
