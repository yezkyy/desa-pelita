<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuliner;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kuliners = Kuliner::all();
        return view('admin.kuliner.index', compact('kuliners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kuliner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional' => 'nullable|string|max:255',
            'harga' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'jam_operasional', 'harga', 'fasilitas', 'lokasi', 'instagram', 'whatsapp', 'tiktok']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kuliner', 'public');
        }

        Kuliner::create($data);

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logika untuk menampilkan detail kuliner
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        return view('admin.kuliner.edit', compact('kuliner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional' => 'nullable|string|max:255',
            'harga' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        $kuliner = Kuliner::findOrFail($id);
        $data = $request->only(['nama', 'deskripsi', 'jam_operasional', 'harga', 'fasilitas', 'lokasi', 'instagram', 'whatsapp', 'tiktok']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kuliner', 'public');
        }

        $kuliner->update($data);

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kuliner $kuliner)
    {
        $kuliner->delete();
        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner deleted successfully.');
    }
}
