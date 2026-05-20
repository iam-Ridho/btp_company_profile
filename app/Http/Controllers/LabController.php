<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $labs = Lab::all();
        return view('laboratorium.index', compact('labs'));
    }

    public function show($id)
    {
        $lab = Lab::findOrFail($id);
        return view('laboratorium.show', compact('lab'));
    }
}
