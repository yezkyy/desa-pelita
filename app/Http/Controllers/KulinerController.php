<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::all();
        return view('kuliner.index', compact('kuliners'));
    }
}
