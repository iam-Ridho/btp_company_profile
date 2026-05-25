<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LspController extends Controller
{
    public function index()
    {
        return view('lsp.index');
    }
}
