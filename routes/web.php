<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; 

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/report_student', function () {
    return view('report_student');
});

// Route::get('/books', function () {
//     return view('books');
// });

Route::get('/student', function () {
    return view('student');
});

Route::get('/transaction', function () {
    return view('transaction');
});

Route::get('/form_add_book', function () {
    return view('form_add_book');
});

Route::get('/books', [BookController::class, 'index'])->name('books');
route::post('/books', [BookController::class, 'store'])->name('add-book');
route::delete('/books/{book}', [BookController::class, 'destroy'])->name('delete-book');
Route::get('/student', [BookController::class, 'index'])->name('students');
