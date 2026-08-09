<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Str;

class UpdateBook
{
    /**
     * Update an existing book.
     *
     * @param  array{title: string, author: string, isbn: string, published_at?: string, description?: string}  $data
     */
    public function __invoke(Book $book, array $data): Book
    {
        $book->update([
            'title' => $data['title'],
            'author' => $data['author'],
            'isbn' => Str::upper($data['isbn']),
            'published_at' => $data['published_at'] ?? $book->published_at,
            'description' => $data['description'] ?? $book->description,
        ]);

        return $book;
    }
}
