<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
    ];

    // Relasi dengan transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
