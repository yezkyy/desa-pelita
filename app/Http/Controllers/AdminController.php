<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalWisata = Wisata::count();
        $totalKuliner = Kuliner::count();
        $totalUsers = User::count();

        // Contoh data aktivitas pengguna
        $activityLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $activityData = [10, 20, 30, 40, 50, 60, 70];

        return view('admin.index', compact('totalWisata', 'totalKuliner', 'totalUsers', 'activityLabels', 'activityData'));
    }
}
