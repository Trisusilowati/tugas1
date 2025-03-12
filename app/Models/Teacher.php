<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher'; // Pastikan nama tabel sesuai dengan yang di database
    protected $fillable = ['name', 'email', 'phone', 'jabatan', 'addres', 'gender', 'status', 'photo'];
}
