<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;

class LowonganController extends Controller
{
    //
    public function index()
    {
        $data = Lowongan::orderBy('created_at', 'desc')->paginate(18);
        // $data = [
        //     'nama' => 'sdad',
        // ];

        return view('lowongans.index', compact('data'));
    }
}
