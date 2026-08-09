<?php

namespace App\Http\Controllers;

use App\Actions\DeleteBook;
use App\Actions\ListBooks;
use App\Actions\StoreBook;
use App\Actions\UpdateBook;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(ListBooks $listBooks): View
    {
        return view('books.index', [
            'books' => $listBooks(),
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request, StoreBook $storeBook): RedirectResponse
    {
        $storeBook($request->validated());

        return redirect()
            ->route('books.index')
            ->with('status', 'Livro cadastrado com sucesso.');
    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book, UpdateBook $updateBook): RedirectResponse
    {
        $updateBook($book, $request->validated());

        return redirect()
            ->route('books.index')
            ->with('status', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book, DeleteBook $deleteBook): RedirectResponse
    {
        $deleteBook($book);

        return redirect()
            ->route('books.index')
            ->with('status', 'Livro excluído com sucesso.');
    }
}
