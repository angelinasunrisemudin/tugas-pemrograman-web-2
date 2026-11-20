<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Novel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Tetap menghasilkan 100 data novel menggunakan NovelFactory Anda
        Novel::factory(100)->create();

        // Mengisi data relasi One-to-Many (Author -> Book) untuk Tugas UTS
        Author::factory(10)
            ->has(Book::factory()->count(5), 'books')
            ->create();
    }
}