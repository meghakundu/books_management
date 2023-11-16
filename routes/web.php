<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create-authors',[App\Http\Controllers\homecontroller::class,'createAuthors'])->name('authors.create');
Route::post('authors_store',[App\Http\Controllers\homecontroller::class,'storeAuthors'])->name('authors.store');
Route::get('/authors',[App\Http\Controllers\homecontroller::class,'indexAuthor'])->name('authors.index');
Route::get('/create-books',[App\Http\Controllers\homecontroller::class,'createBooks'])->name('books.create');
Route::post('books_store',[App\Http\Controllers\homecontroller::class,'storeBooks'])->name('books.store');
Route::get('/books',[App\Http\Controllers\homecontroller::class,'indexBooks'])->name('books.index');
Route::get('authors/{id}/edit','App\Http\Controllers\homecontroller@editAuthors')->name('authors.edit');
Route::put('authors/{id}/update',[App\Http\Controllers\homecontroller::class,'updateAuthors'])->name('authors.update');
Route::get('books/{id}/edit','App\Http\Controllers\homecontroller@editBooks')->name('books.edit');
Route::put('books/{id}/update',[App\Http\Controllers\homecontroller::class,'updateBooks'])->name('books.update');
Route::delete('/delete-book/{item}',[App\Http\Controllers\homecontroller::class,'deleteBooks'])->name('books.delete');
Route::put('/delete-author/{item}',[App\Http\Controllers\homecontroller::class,'deleteAuthors'])->name('authors.delete');
     