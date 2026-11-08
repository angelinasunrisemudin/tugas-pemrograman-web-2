<?php

namespace Database\Factories;

use App\Models\Novel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Novel>
 */
class NovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        // Kata-kata dasar bahasa Indonesia untuk merangkai judul secara otomatis
        $kataIndo = ['Kisah', 'Jejak', 'Merajut', 'Mimpi', 'Cinta', 'Rahasia', 'Lembayung', 'Senja', 'Bayang', 'Masa', 'Bintang', 'Samudra', 'Catatan', 'Hikmah', 'Langkah'];

        $judulOtomatis = $faker->randomElement($kataIndo) . ' ' . $faker->randomElement($kataIndo) . ' ' . $faker->firstName();

        return [
            'judul'        => $judulOtomatis,
            'penulis'      => $faker->name(),
            'penerbit'     => $faker->company(),
            'tahun_terbit' => $faker->year(),
            'genre'        => $faker->randomElement(['Fiksi', 'Romantis', 'Misteri', 'Petualangan', 'Horor']),
            'status'       => $faker->randomElement(['Sudah Dibaca', 'Belum Dibaca']),
        ];
    }
}