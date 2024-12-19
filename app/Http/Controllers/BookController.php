<?php

namespace App\Http\Controllers;

use App\Models\Book; // Pastikan model Book diimport
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Mengambil semua data buku dari database
        $books = Book::get();

        // Mengirimkan data ke view
        return view('books', ['books' => $books]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bookName' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        Book::create([
            'title' => $validated['bookName'],
            'author' => $validated['author'],
        ]);

        return redirect()->route('books')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book) 
    {
        return view('form_edit_book', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bookName' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->update([
            'title' => $validated['bookName'],
            'author' => $validated['author'],
        ]);

        return redirect()->route('books')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books')->with('success', 'Book deleted successfully!');
    }
}
