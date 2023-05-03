<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $fillable = [
        'bidang_keahlian',
        'nama_ruang',
        'jumlah_siswa',
        'panjang',
        'lebar',
        'kondisi_ruang1',
        'kondisi_ruang2',
        'kondisi_ruang3',
        'kondisi_ruang4',
        'kondisi_ruang5',
        'kondisi_ruang6',
        'kondisi_ruang7',
        'apd1',
        'apd2',
        'apd3',
        'keterangan',
    ];
}
