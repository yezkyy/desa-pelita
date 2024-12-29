<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kuliner_id' => 'nullable|exists:kuliners,id',
            'wisata_id' => 'nullable|exists:wisatas,id',
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'pesan' => 'required|string',
        ]);

        $data = $request->only(['kuliner_id', 'wisata_id', 'nama', 'rating', 'pesan']);

        // Hapus wisata_id jika null
        if (is_null($data['wisata_id'])) {
            unset($data['wisata_id']);
        }

        Testimoni::create($data);

        return back()->with('success', 'Testimoni berhasil ditambahkan.');
    }
}