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
        $transactions = Transaction::join('books', 'transactions.book_id', '=', 'books.id')
            ->join('students', 'transactions.student_id', '=', 'students.id')
            ->select('transactions.*', 'books.title as book_title', 'students.name as student_name')
            ->get();

        return view('transaction', [
            'transactions' => $transactions
        ]);
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

    public function edit(Transaction $transaction)
    {
        $books = Book::all();
        $students = Student::all();

        return view('form_edit_transaction', [
            'transaction' => $transaction,
            'books' => $books,
            'students' => $students
        ]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update([
            'book_id' => $request->book_id,
            'student_id' => $request->student_id,
            'borrowed_at' => $request->borrowed_at,
            'returned_at' => $request->returned_at
        ]);

        return to_route('transaction.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return to_route('transaction.index')->with('success', 'Data berhasil dihapus');
    }
}
