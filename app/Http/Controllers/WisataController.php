<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    /**
     * Menampilkan halaman wisata.
     */
    public function index()
    {
        $wisatas = Wisata::all();
        return view('wisata.index', compact('wisatas'));
    }
}
