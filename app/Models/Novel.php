<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini diisi data
    protected $fillable = ['title', 'author', 'publisher', 'publication_year', 'genre', 'reading_status'];
}