<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kuliner;

class KulinerSeeder extends Seeder
{
    public function run()
    {
        Kuliner::create([
            'nama' => 'Nasi Pelita',
            'deskripsi' => 'Nasi khas dengan rempah-rempah lokal.',
            'gambar' => 'kuliner/nasi_pelita.jpg',
        ]);

        Kuliner::create([
            'nama' => 'Sate Pelita',
            'deskripsi' => 'Sate yang dibuat dari bahan berkualitas tinggi.',
            'gambar' => 'kuliner/sate_pelita.jpg',
        ]);

        Kuliner::create([
            'nama' => 'Es Pelita',
            'deskripsi' => 'Minuman segar untuk melengkapi hari Anda.',
            'gambar' => 'kuliner/es_pelita.jpg',
        ]);
    }
}
