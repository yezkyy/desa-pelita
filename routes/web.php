<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\WisataController as AdminWisataController;
use App\Http\Controllers\Admin\KulinerController as AdminKulinerController;
use App\Http\Controllers\TestimoniController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner.index');
Route::get('/kuliner/{id}', [KulinerController::class, 'show'])->name('kuliner.show');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// Rute CRUD untuk Wisata dan Kuliner
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('wisata', AdminWisataController::class, ['as' => 'admin']);
    Route::resource('kuliner', AdminKulinerController::class, ['as' => 'admin']);
});

Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('testimoni.store');