<?php

use Illuminate\Database\Seeder;

class UsersStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->insert([
            'name' => 'N/A',
        ]);
        DB::table('user_status')->insert([
            'name' => 'Approved',
        ]);
        DB::table('user_status')->insert([
            'name' => 'Waiting for approval',
        ]);
    }
}
