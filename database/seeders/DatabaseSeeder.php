<?php

namespace Database\Seeders;

use App\Models\Novel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Novel::factory(100)->create();
    }
}