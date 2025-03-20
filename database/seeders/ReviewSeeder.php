<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Take exactly 30 books (you can change the number if needed)
        $books = Book::take(30)->get();

        // Iterate over each book
        foreach ($books as $book) {
            // Create 3 random reviews for each book
            for ($i = 0; $i < 3; $i++) {
                Review::factory()->create([
                    'book_id' => $book->id,
                    // Optionally, you can randomize other fields such as 'rating', 'content', etc.
                ]);
            }
        }
    }
}
