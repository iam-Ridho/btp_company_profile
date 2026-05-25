<?php

namespace App\Http\Controllers;

use App\Models\Kemahasiswaan;
use Illuminate\Http\Request;

class KemahasiswaanController extends Controller
{
    /**
     * Halaman index: tampilkan semua item kemahasiswaan
     * dengan dropdown berisi kolom 'nama'.
     * Jika ada query ?selected=id, tampilkan detail item tersebut.
     */
    public function index(Request $request)
    {
        $items     = Kemahasiswaan::all();
        $selectedId = $request->query('selected');

        // Jika ada item yang dipilih, ambil datanya; jika tidak, ambil yang pertama
        $selected = $selectedId
            ? Kemahasiswaan::find($selectedId)
            : $items->first();

        return view('kemahasiswaan.index', compact('items', 'selected'));
    }

    /**
     * Halaman detail satu item kemahasiswaan (opsional, untuk URL langsung)
     */
    public function show($id)
    {
        $items    = Kemahasiswaan::all();
        $selected = Kemahasiswaan::findOrFail($id);

        return view('kemahasiswaan.index', compact('items', 'selected'));
    }
}
