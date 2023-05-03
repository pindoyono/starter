<?php

namespace App\Http\Controllers;

use App\Models\Ruang;

class RuangController extends Controller
{
    //
    public function index()
    {
        $data = Ruang::orderBy('created_at', 'desc')->paginate(18);

        return view('ruangs.index', compact('data'));
    }
}
