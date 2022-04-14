<?php

namespace Database\Seeders;

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345'),
            'isAdmin' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => '13456',
            'isAdmin' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user12345'),
            'isAdmin' => '0',
        ]);
    }
}
