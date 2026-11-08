<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['judul', 'penulis', 'penerbit', 'tahun_terbit', 'genre', 'status'])]
class Novel extends Model
{
    use HasFactory;
}