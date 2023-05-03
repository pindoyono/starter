<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;

class SekolahController extends Controller
{
    //
    //
    public function index()
    {
        $data = Sekolah::orderBy('created_at', 'desc')->paginate(18);

        return view('sekolahs.index', compact('data'));
    }
}
