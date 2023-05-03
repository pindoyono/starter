<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    //
    public function index()
    {
        $data = Perusahaan::orderBy('created_at', 'desc')->paginate(18);
        // $data = [
        //     'nama' => 'sdad',
        // ];

        return view('perusahaans.index', compact('data'));
    }
}
