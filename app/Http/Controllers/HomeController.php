<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\Testimoni;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::take(3)->get(); // Ambil 3 data wisata
        $kuliners = Kuliner::take(3)->get(); // Ambil 3 data kuliner
        $testimonis = Testimoni::all();
        $beritas = Berita::latest()->take(3)->get();

        return view('home', compact('wisatas', 'kuliners', 'testimonis', 'beritas'));
    }
}