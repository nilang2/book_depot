<?php

use Illuminate\Database\Seeder;

class UsersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
            'name' => 'Administrator',
        ]);
        DB::table('user_type')->insert([
            'name' => 'Curator',
        ]);
        DB::table('user_type')->insert([
            'name' => 'Member',
        ]);
    }
}
