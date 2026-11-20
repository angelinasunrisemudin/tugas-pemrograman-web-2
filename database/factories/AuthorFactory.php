<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        $biografiList = [
            'Penulis fiksi dan cerita pendek yang gemar mengangkat kisah kehidupan sehari-hari.',
            'Menulis karya bertema perjalanan, budaya, dan dinamika keluarga di Indonesia.',
            'Aktif menulis novel bertema drama, misteri, dan romansa dengan gaya bahasa mengalir.',
            'Mengawali karier menulis dari catatan harian hingga menerbitkan berbagai buku populer.',
        ];

        return [
            'nama'        => $faker->name(),
            'email'       => $faker->unique()->safeEmail(),
            'negara_asal' => $faker->randomElement(['Indonesia', 'Jepang', 'Inggris', 'Amerika Serikat', 'Korea Selatan']),
            'biografi'    => $faker->randomElement($biografiList),
        ];
    }
}