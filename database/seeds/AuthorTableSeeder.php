<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author')->insert([
            'fname' => 'Mark',
            'lname' => 'Twain',
            'dob' => 30/11/1835,
            'nationality' => 'American'
        ]);
        DB::table('author')->insert([
            'fname' => 'Charles',
            'lname' => 'Dickens',
            'dob' => 26/12/791,
            'nationality' => 'British'
        ]);
        DB::table('author')->insert([
            'fname' => 'William',
            'lname' => 'Shakespeare',
            'dob' => 1/4/1564,
            'nationality' => 'British'
        ]);
        DB::table('author')->insert([
            'fname' => 'F. Scott',
            'lname' => 'Fitzgerald',
            'dob' => 24/9/1896,
            'nationality' => 'American'
        ]);
        DB::table('author')->insert([
            'fname' => 'Harper',
            'lname' => 'Lee',
            'dob' => 28/4/1926,
            'nationality' => 'American'
        ]);
    }
}
