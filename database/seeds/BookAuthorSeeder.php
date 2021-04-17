<?php

use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book__authors')->insert([
            'author_id' => '1',
            'book_id' => '1',
        ]);
        DB::table('book__authors')->insert([
            'author_id' => '1',
            'book_id' => '2',
        ]);
        DB::table('book__authors')->insert([
            'author_id' => '2',
            'book_id' => '2',
        ]);
        DB::table('book__authors')->insert([
            'author_id' => '3',
            'book_id' => '3',
        ]);
        DB::table('book__authors')->insert([
            'author_id' => '4',
            'book_id' => '3',
        ]);
    }
}
