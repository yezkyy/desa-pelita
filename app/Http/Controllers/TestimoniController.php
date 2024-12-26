<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'pesan' => 'required|string',
        ]);

        Testimoni::create($request->only(['wisata_id', 'nama', 'rating', 'pesan']));

        return redirect()->back()->with('success', 'Testimoni berhasil dikirim.');
    }
}