<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $filter = $request->query('filter');

        $wisatas = Wisata::query();

        if ($search) {
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
        return view('wisata.show', compact('wisata'));
    }
}
