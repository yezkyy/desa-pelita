<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil semua seeder
        $this->call([
            UsersTableSeeder::class,
            BeritaSeeder::class,
            KulinerSeeder::class,
            WisataSeeder::class,
        ]);
    }
}
