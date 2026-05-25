<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Menampilkan 3 berita terbaru di halaman utama
        $beritas = News::latest('published_at')->take(3)->get();
        return view('home', compact('beritas'));
    }
}
