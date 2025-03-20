<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; // Nama tabel di database

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'asal_sekolah',
        'nomor_hp',
        'alamat_email',
        'nama_ayah',
        'nama_ibu', 
        'jurusan_pertama',
        'jurusan_kedua',
        'jurusan_ketiga'
    ];
}
