<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([ 
            'title' => ' Following the Equator ',
            'genre' => 'travel',
            'published_year' => 1897,
            'image' => 'images/book.jpg',
            'avg_rating' => 4.5,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('books')->insert([ 
            'title' => 'The Mysterious Stranger',
            'genre' => 'nature',
            'published_year' => 1961,
            'image' => 'images/book.jpg',
            'avg_rating' => 3.5,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('books')->insert([ 
            'title' => 'The Great Gatsby',
            'genre' => 'Fiction, Trajedy',
            'published_year' => 1925,
            'image' => 'images/book.jpg',
            'avg_rating' => 3.5,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('books')->insert([ 
            'title' => 'To KIll A Moking Bird',
            'genre' => 'Thriller',
            'published_year' => 1960,
            'image' => 'images/book.jpg',
            'avg_rating' => 2.5,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('books')->insert([ 
            'title' => 'One Hundred Years of Solitude',
            'genre' => 'Magic',
            'published_year' => 1967,
            'image' => 'images/book.jpg',
            'avg_rating' => 2.5,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
