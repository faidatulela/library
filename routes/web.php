<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;

Route::get('/report_student', function () {
    return view('report_student');
});

Route::get('/transaction', function () {
    return view('transaction');
});

Route::get('/form_add_book', function () {
    return view('form_add_book');
});

Route::get('/books', [BookController::class, 'index'])->name('books');
route::post('/books', [BookController::class, 'store'])->name('add-book');
route::get('/books/{book}', [BookController::class, 'edit'])->name('edit-book');
route::delete('/books/{book}', [BookController::class, 'destroy'])->name('delete-book');
route::put('/books/{book}', [BookController::class, 'update'])->name('update-book');

Route::resource('/student', StudentController::class);
Route::resource('/transaction', TransactionController::class);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');