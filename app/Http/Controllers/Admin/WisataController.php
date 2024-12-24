<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $wisata = new Wisata();
        $wisata->nama = $request->nama;
        $wisata->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('images', $filename, 'public');
            $wisata->gambar = $path;
        }

        $wisata->save();

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata created successfully.');
    }

    public function edit(Wisata $wisata)
    {
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $wisata->nama = $request->nama;
        $wisata->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($wisata->gambar) {
                Storage::disk('public')->delete($wisata->gambar);
            }

            $filename = $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('images', $filename, 'public');
            $wisata->gambar = $path;
        }

        $wisata->save();

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata updated successfully.');
    }

    public function destroy($id)
    {
        $wisata = Wisata::find($id);

        if (!$wisata) {
            Log::error('Wisata not found with ID: ' . $id);
            return redirect()->route('admin.wisata.index')->with('error', 'Wisata not found.');
        }

        Log::info('Destroy method called for Wisata ID: ' . $wisata->id);

        // Hapus gambar jika ada
        if ($wisata->gambar) {
            Storage::disk('public')->delete($wisata->gambar);
        }

        $deleted = $wisata->delete();
        Log::info('Wisata deleted successfully: ' . ($deleted ? 'true' : 'false'));

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata deleted successfully.');
    }
}