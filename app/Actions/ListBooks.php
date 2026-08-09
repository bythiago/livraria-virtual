<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class ListBooks
{
    /**
     * Get the latest books paginated, with optional search.
     *
     * @return LengthAwarePaginator<int, Book>
     */
    public function __invoke(): LengthAwarePaginator
    {
        $query = Book::query();

        if ($search = Request::input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('isbn', 'like', "%{$search}%");
            });
        }

        return $query->latest()->paginate(15)->withQueryString();
    }
}
