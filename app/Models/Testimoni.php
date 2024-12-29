<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'kuliner_id',
        'nama',
        'rating',
        'pesan',
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class);
    }
}