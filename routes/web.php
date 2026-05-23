<?php

use Illuminate\Support\Facades\Route;

// Mock data removed

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);

Route::get('/visi-misi', function () {
    return view('visi_misi');
});

use App\Http\Controllers\DosenController;

Route::get('/data-dosen', [DosenController::class, 'index']);

use App\Http\Controllers\StaffController;

Route::get('/data-plp-admin', [StaffController::class, 'index']);

use App\Http\Controllers\NewsController;
Route::get('/berita', [NewsController::class, 'index']);
Route::get('/berita/{id}', [NewsController::class, 'show']);

use App\Http\Controllers\LabController;
Route::get('/laboratorium', [LabController::class, 'index']);
Route::get('/laboratorium/{id}', [LabController::class, 'show']);

use App\Http\Controllers\ProdukController;
Route::get('/produk', [ProdukController::class, 'index']);
