<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'book_id',
        'student_id',
        'borrowed_at',
        'returned_at',
    ];

    // Relasi dengan buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi dengan siswa
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
