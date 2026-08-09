<?php

namespace App\Actions;

use App\Models\Book;

class DeleteBook
{
    /**
     * Delete a book.
     */
    public function __invoke(Book $book): void
    {
        $book->delete();
    }
}
