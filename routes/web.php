<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\KulinerController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner.index');

