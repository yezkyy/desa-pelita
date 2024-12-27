<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::all();
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional' => 'nullable|string|max:255',
            'harga_tiket' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'jam_operasional', 'harga_tiket', 'fasilitas', 'lokasi', 'instagram', 'whatsapp', 'tiktok']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('wisata', 'public');
        }

        Wisata::create($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jam_operasional' => 'nullable|string|max:255',
            'harga_tiket' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $wisata = Wisata::findOrFail($id);
        $data = $request->only(['nama', 'deskripsi', 'jam_operasional', 'harga_tiket', 'fasilitas', 'lokasi', 'instagram', 'whatsapp', 'tiktok']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('wisata', 'public');
        }

        $wisata->update($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->delete();
        return redirect()->route('admin.wisata.index')->with('success', 'Wisata deleted successfully.');
    }
}