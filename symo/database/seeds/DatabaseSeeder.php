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
            'type'=>1,
            'password'=>bcrypt('123456'),
            'status'=>2
        ]);
     

    }
}
