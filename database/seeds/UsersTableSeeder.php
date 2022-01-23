<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'admin',
            'email' => 'fadi.bakour101@gmail.com',
            'password' => bcrypt('12341234'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'normal user',
            'email' => 'fadi.test@gmail.com',
            'password' => bcrypt('12341234'),
            'role' => 'user',
        ]);
    }
}
