<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'bidang_usaha',
        'no_telpon',
        'fax',
        'email',
        'website',
        'npwp',
        'alamat',
        'rt',
        'rw',
        'nama_dusun',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'kode_pos',
        'lintang',
        'bujur',
        'user_id',
    ];
}
