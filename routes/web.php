<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestBooks = Book::query()->latest()->take(12)->get();
    $featuredBooks = Book::query()->inRandomOrder()->take(6)->get();
    $authors = Book::query()->select('author')->distinct()->pluck('author')->take(10);

    return view('home', [
        'latestBooks' => $latestBooks,
        'featuredBooks' => $featuredBooks,
        'authors' => $authors,
    ]);
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    return back()->withErrors([
        'email' => 'Credenciais inválidas.',
    ])->onlyInput('email');
})->name('login.store');

Route::post('/logout', function () {
    auth()->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('books', BookController::class)->only([
        'create', 'store', 'edit', 'update', 'destroy',
    ]);
});

Route::get('/books/{book}', [BookController::class, 'show'])
    ->name('books.show');
