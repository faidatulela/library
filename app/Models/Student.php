<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'contact',
    ];

    // Relasi dengan transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
