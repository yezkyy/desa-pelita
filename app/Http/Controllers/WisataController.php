<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Testimoni;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $filter = $request->query('filter');

        $wisatas = Wisata::query();

        if ($search)    {
            $wisatas->where('nama', 'LIKE', "%{$search}%");
        }

        if ($filter == 'popular') {
            $wisatas->orderBy('popularity', 'desc');
        } elseif ($filter == 'recent') {
            $wisatas->orderBy('created_at', 'desc');
        }

        $wisatas = $wisatas->paginate(9);

        return view('wisata.index', compact('wisatas'));
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        $testimonis = Testimoni::where('wisata_id', $id)->get();
        $averageRating = $testimonis->avg('rating');
        return view('wisata.detail', compact('wisata', 'testimonis', 'averageRating'));
    }
}
