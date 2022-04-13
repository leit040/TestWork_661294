<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\PublishingHouse;
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
         \App\Models\User::factory(10)->create();
         $authors = Author::factory(25)->create();
         $publishingHouses = PublishingHouse::factory(10)->create();
         $books = Book::factory(100)->make(['publishing_house_id'=>null])->each(function($book) use($publishingHouses,$authors){
             $book->publishing_house_id = $publishingHouses->random()->id;
            $book->save();
             $book->authors()->attach([$authors->random()->id=>['is_main_author'=>true]]);
             $book->authors()->attach($authors->random(1,5));
         });

    }
}
