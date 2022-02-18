<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'user',
            'email'=> 'user@email.com',
            'password' => bcrypt('12345'),
            'gender'=>1,
            'address'=>'123',
            'phone'=>'11',
            'is_admin'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email'=> 'admin@email.com',
            'password' => bcrypt('12345'),
            'gender'=>1,
            'address'=>'123',
            'phone'=>'11',
            'is_admin'=>1
        ]);
        DB::table('users')->insert([
            'name' => 'Tiểu La',
            'email'=> 'laravel@gmail.com',
            'password' => bcrypt('12345'),
            'gender'=>0,
            'address'=>'92 Quang Trung Đà Nẵng',
            'phone'=>'023363789990',
            'is_admin'=>0
        ]);

    }
}
