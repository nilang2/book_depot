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
            'name' =>'Admin',
            'email' => 'Admin@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 1,
            'user_status_id' => 3
        ]);
        DB::table('users')->insert([
            'name' =>'Chris',
            'email' => 'Chris@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 2,
            'user_status_id' => 1
        ]);
        DB::table('users')->insert([
            'name' =>'Tony',
            'email' => 'Tony@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 2,
            'user_status_id' => 1
        ]);
        DB::table('users')->insert([
            'name' =>'Zack',
            'email' => 'Zack@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 2,
            'user_status_id' => 1
        ]);
        DB::table('users')->insert([
            'name' =>'Dave',
            'email' => 'Dave@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 2,
            'user_status_id' => 2
        ]);
        DB::table('users')->insert([
            'name' =>'Chloe',
            'email' => 'Chloe@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 2,
            'user_status_id' => 2
        ]);
        DB::table('users')->insert([
            'name' =>'Cara',
            'email' => 'Cara@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 2,
            'user_status_id' => 2
        ]);
        DB::table('users')->insert([
            'name' =>'Bob',
            'email' => 'Bob@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 3,
            'user_status_id' => 3
        ]);
        DB::table('users')->insert([
            'name' =>'Fred',
            'email' => 'Fred@a.org',
            'password' => bcrypt('1234'),
            'user_type_id' => 3,
            'user_status_id' => 3
        ]);
    }
}
