<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
use App\Http\Controllers\SuggestionController;

Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');
Route::post('/books/{book}/favorite', [FavoriteController::class, 'store'])->name('books.favorite');
Route::delete('/books/{book}/unfavorite', [FavoriteController::class, 'destroy'])->name('books.unfavorite');
Route::get('/wishlist', [FavoriteController::class, 'index'])->name('wishlist');
Route::middleware(['auth'])->group(function () {
Route::post('/books/{book}/favorite', [FavoriteController::class, 'store'])->name('books.favorite');
Route::delete('/books/{book}/unfavorite', [FavoriteController::class, 'destroy'])->name('books.unfavorite');
Route::get('/wishlist', [FavoriteController::class, 'index'])->name('wishlist');
});
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::resource('books', BookController::class);
