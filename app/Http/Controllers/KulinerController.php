<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;
use App\Models\Testimoni;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::all();
        return view('kuliner.index', compact('kuliners'));
    }

    public function show($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        $testimonis = Testimoni::where('kuliner_id', $id)->get();
        $averageRating = $testimonis->avg('rating');
        return view('kuliner.detail', compact('kuliner', 'testimonis', 'averageRating'));
    }
}