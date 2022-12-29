<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    private const AMOUNT_OF_BOOKS = 20;
    private const AUTHORS_PER_BOOK = 2;

    public function run(): void
    {
        $books = Book::factory(self::AMOUNT_OF_BOOKS)->create();
        $books->each(function (Book $book) {
            $author = Author::factory(self::AUTHORS_PER_BOOK)->create();
            $author->each(function (Author $author) use ($book) {
                $book->authors()->save($author);
            });
        });
    }
}
