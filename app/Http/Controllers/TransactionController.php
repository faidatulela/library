<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction');
    }

    public function create()
    {
        $books = Book::all();
        $students = Student::all();

        return view('form_add_transaction', [
            'books' => $books,
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        Transaction::create([
            'book_id' => $request->book_id,
            'student_id' => $request->student_id,
            'borrowed_at' => $request->borrowed_at,
            'returned_at' => $request->returned_at
        ]);

        return to_route('transaction.index')->with('success', 'Data berhasil disimpan');
    }
}
