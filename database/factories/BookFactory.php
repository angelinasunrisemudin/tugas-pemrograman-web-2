<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        $kataAwal = ['Jejak', 'Rahasia', 'Kisah', 'Cahaya', 'Catatan', 'Bayang', 'Lembayung', 'Rindu', 'Langkah', 'Mimpi'];
        $kataTengah = ['Senja', 'Malam', 'Pagi', 'Hujan', 'Kota', 'Waktu', 'Harapan', 'Angin', 'Langit', 'Dermaga'];
        $kataAkhir = ['di Ujung Jalan', 'yang Hilang', 'Tanpa Kata', 'di Balik Awan', 'Masa Depan', 'Kita'];

        $judulBuku = $faker->randomElement($kataAwal) . ' ' .
                     $faker->randomElement($kataTengah) . ' ' .
                     $faker->randomElement($kataAkhir);

        $sinopsisList = [
            'Kisah penuh haru tentang pencarian jati diri, persahabatan, dan keberanian mengambil keputusan penting.',
            'Sebuah perjalanan tak terduga yang mengungkap rahasia lama dan menguji keteguhan hati tokoh utamanya.',
            'Mengisahkan pertemuan dua arah hidup yang saling menguatkan di tengah perubahan zaman.',
            'Cerita mendalam mengenai impian, pengorbanan, dan makna pulang ke rumah yang sesungguhnya.',
        ];

        return [
            'author_id'      => Author::inRandomOrder()->value('id') ?? Author::factory(),
            'judul'          => $judulBuku,
            'isbn'           => $faker->isbn13(),
            'tahun_terbit'   => (int) $faker->numberBetween(2005, 2026),
            'jumlah_halaman' => $faker->numberBetween(120, 650),
            'harga'          => $faker->numberBetween(45000, 185000),
            'sinopsis'       => $faker->randomElement($sinopsisList),
        ];
    }
}