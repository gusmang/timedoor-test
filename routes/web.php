<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksAuthorController;
use App\Http\Controllers\BooksListController;
use App\Http\Controllers\BooksRatingController;
use App\Http\Controllers\BooksCategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BooksListController::class, 'home'])->name('books_list.index');
Route::get('/booklist', [BooksListController::class, 'booklist'])->name('books_list.list');
Route::get('list_books', [BooksListController::class, 'list'])->name('list_books');

Route::get('books_author', [BooksAuthorController::class, 'list'])->name('books_author.index');
Route::get('listed', [BooksAuthorController::class, 'listed'])->name('books_author.listed');
Route::get('list_author', [BooksAuthorController::class, 'list_author'])->name('list_author');

Route::get('rating', [BooksRatingController::class, 'rating'])->name('books_rating.rating');
Route::post('post_rating', [BooksRatingController::class, 'post_rating'])->name('books_rating.post_rating');

Route::get('list_categories', [BooksCategoriesController::class, 'list'])->name('list_categories');
