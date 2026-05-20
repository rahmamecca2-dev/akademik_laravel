<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'email',
        'prodi',
        'alamat'
    ];
}
