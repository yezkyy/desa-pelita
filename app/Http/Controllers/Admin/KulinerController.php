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
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $kuliner = new Kuliner();
        $kuliner->nama = $request->nama;
        $kuliner->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $kuliner->gambar = $path;
        }

        $kuliner->save();

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner created successfully.');
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
    public function edit(Kuliner $kuliner)
    {
        return view('admin.kuliner.edit', compact('kuliner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kuliner $kuliner)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $kuliner->nama = $request->nama;
        $kuliner->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $kuliner->gambar = $path;
        }

        $kuliner->save();

        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner updated successfully.');
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
