<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([ 
            'name' => 'Fiction',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Realism',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Novel',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Adventure',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Mystery',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Fantasy',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Travel',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Autobiography',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Crime',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Humor',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('genres')->insert([ 
            'name' => 'Philosophy',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
