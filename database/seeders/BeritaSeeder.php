<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
            'judul' => 'Berita Pertama',
            'konten' => 'Ini adalah konten berita pertama.',
            'gambar' => 'path/to/image1.jpg',
        ]);

        Berita::create([
            'judul' => 'Berita Kedua',
            'konten' => 'Ini adalah konten berita kedua.',
            'gambar' => 'path/to/image2.jpg',
        ]);

        Berita::create([
            'judul' => 'Berita Ketiga',
            'konten' => 'Ini adalah konten berita ketiga.',
            'gambar' => 'path/to/image3.jpg',
        ]);
    }
}
