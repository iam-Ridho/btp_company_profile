<?php

use Illuminate\Support\Facades\Route;

// Mock data removed

Route::get('/', function () {
    return view('home');
});

Route::get('/visi-misi', function () {
    return view('visi_misi');
});

use App\Http\Controllers\DosenController;

Route::get('/data-dosen', [DosenController::class, 'index']);

use App\Http\Controllers\StaffController;

Route::get('/data-plp-admin', [StaffController::class, 'index']);

Route::get('/berita', function () {
    $data = [];
    for($i=1; $i<=15; $i++) {
        $data[] = [
            'id' => $i,
            'title' => 'Placeholder Berita ' . $i,
            'date' => 'Desember 18, 2021',
            'author' => 'Admin',
            'category' => 'Uncategorized',
            'image' => 'https://btp.politanisamarinda.ac.id/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-15-at-9.49.53-AM-720x445.jpeg',
            'excerpt' => 'Ini adalah text placeholder untuk berita ' . $i . '. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
        ];
    }
    
    $currentPage = request()->get('page', 1);
    $perPage = 5;
    $collection = new \Illuminate\Support\Collection($data);
    $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
    $paginatedItems = new \Illuminate\Pagination\LengthAwarePaginator($currentPageItems, count($collection), $perPage);
    $paginatedItems->setPath(request()->url());

    return view('berita', ['beritas' => $paginatedItems]);
});

use App\Http\Controllers\LabController;
Route::get('/laboratorium', [LabController::class, 'index']);
Route::get('/laboratorium/{id}', [LabController::class, 'show']);
