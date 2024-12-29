<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'jam_operasional',
        'harga',
        'fasilitas',
        'lokasi',
        'instagram',
        'whatsapp',
        'tiktok',
    ];

    public function testimonis()
    {
        return $this->hasMany(Testimoni::class);
    }
}
