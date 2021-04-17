<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersStatusSeeder::class);
        $this->call(UsersTypeSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(BookAuthorSeeder::class);
    }
}
