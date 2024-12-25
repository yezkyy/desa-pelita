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
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $wisata = new Wisata();
        $wisata->nama = $request->nama;
        $wisata->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $wisata->gambar = $path;
        }

        $wisata->save();

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata created successfully.');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $wisata = Wisata::findOrFail($id);
        $wisata->nama = $request->nama;
        $wisata->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $wisata->gambar = $path;
        }

        $wisata->save();

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata updated successfully.');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->delete();
        return redirect()->route('admin.wisata.index')->with('success', 'Wisata deleted successfully.');
    }
}