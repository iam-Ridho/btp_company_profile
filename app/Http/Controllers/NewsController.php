<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::latest('published_at');

        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        $beritas = $query->paginate(5)->withQueryString();
        return view('berita', compact('beritas'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('berita.show', compact('news'));
    }
}
