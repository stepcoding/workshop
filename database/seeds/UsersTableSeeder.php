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
        DB::table('roles')->insert([
            'name' =>'Administrator'
        ]);

        DB::table('users')->insert([
            'name' => 'Tok Takz',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
