<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
// use App\Models\Topic;
// use App\Models\Platform;
// use App\Models\User;
// use App\Models\Author;
// use App\Models\Course;
// use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create 50 users
        Book::factory(50)->create();
    }
}
