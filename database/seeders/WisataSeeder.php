<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wisata;

class WisataSeeder extends Seeder
{
    public function run()
    {
        Wisata::create([
            'nama' => 'Pantai Pelita',
            'deskripsi' => 'Pantai indah dengan pasir putih yang memukau.',
            'gambar' => 'wisata/pantai_pelita.jpg',
        ]);

        Wisata::create([
            'nama' => 'Gunung Pelita',
            'deskripsi' => 'Gunung dengan pemandangan yang luar biasa.',
            'gambar' => 'wisata/gunung_pelita.jpg',
        ]);

        Wisata::create([
            'nama' => 'Air Terjun Pelita',
            'deskripsi' => 'Air terjun yang menyegarkan dan menenangkan.',
            'gambar' => 'wisata/air_terjun_pelita.jpg',
        ]);
    }
}
