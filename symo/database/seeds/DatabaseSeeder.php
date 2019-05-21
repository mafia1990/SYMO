<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'amir',
            'email'=>'b@b.com',
            'mobile'=>'1234',
            'gender'=>1,
            'password'=>bcrypt('123456'),
            'status'=>2
        ]);
        DB::table('roles')->insert([
            'name'=>'admin'
                   ]);
        DB::table('role_user')->insert([
            'user_id'=>'1',
            'role_id'=>'1'
        ]);
        DB::table('users')->insert([
            'name'=>'amir',
            'email'=>'a@a.com',
            'mobile'=>'1234',
            'gender'=>1,
            'password'=>bcrypt('123456'),
            'status'=>2
        ]);
        DB::table('roles')->insert([
            'name'=>'operator'
        ]);
        DB::table('role_user')->insert([
            'user_id'=>'2',
            'role_id'=>'2'
        ]);
    }
}
