<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'judul',
        'isbn',
        'tahun_terbit',
        'jumlah_halaman',
        'harga',
        'sinopsis',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}