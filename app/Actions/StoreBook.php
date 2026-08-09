<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Str;

class StoreBook
{
    /**
     * Create a new book.
     *
     * @param  array{title: string, author: string, isbn: string, published_at?: string, description?: string}  $data
     */
    public function __invoke(array $data): Book
    {
        return Book::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'isbn' => Str::upper($data['isbn']),
            'published_at' => $data['published_at'] ?? null,
            'description' => $data['description'] ?? null,
        ]);
    }
}
