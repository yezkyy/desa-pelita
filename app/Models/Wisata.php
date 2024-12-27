<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'jam_operasional',
        'harga_tiket',
        'fasilitas',
        'lokasi',
        'instagram',
        'whatsapp',
        'tiktok',
    ];
}