<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
Route::get('reviews/book/{book}', [ReviewsController::class, 'create'])->name('reviews.book');
Route::post('reviews/store', [ReviewsController::class, 'store'])->name('reviews.store');