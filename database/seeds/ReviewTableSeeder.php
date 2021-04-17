<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([ 
            'review_text' => 'Good book with great content.',
            'rating' => 4,   
            'book_id' => 1,
            'user_id' => 2,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => 'Okay book with great content.',
            'rating' => 3,   
            'book_id' => 1,
            'user_id' => 3,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => 'Book with great content.',
            'rating' => 3.5,   
            'book_id' => 1,
            'user_id' => 4,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => 'Book with great content.',
            'rating' => 3.5,   
            'book_id' => 2,
            'user_id' => 4,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => 'Book with boring content.',
            'rating' => 1.5,   
            'book_id' => 3,
            'user_id' => 5,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => 'Book with amazing content.',
            'rating' => 4,   
            'book_id' => 3,
            'user_id' => 6,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => "Novel inspired by author's life.",
            'rating' => 3,   
            'book_id' => 3,
            'user_id' => 7,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => "Legendary book.",
            'rating' => 5,
            'book_id' => 3,
            'user_id' => 8,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => "The content of the book is not up to the mark.",
            'rating' => 2,   
            'book_id' => 3,
            'user_id' => 3,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('review')->insert([ 
            'review_text' => "With great author comes great book.",
            'rating' => 5,   
            'book_id' => 3,
            'user_id' => 2,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
