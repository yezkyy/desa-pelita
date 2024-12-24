<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kuliner;

class HomeController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::take(3)->get(); // Ambil 3 data wisata
        $kuliners = Kuliner::take(3)->get(); // Ambil 3 data kuliner

        return view('home', compact('wisatas', 'kuliners'));
    }
}
