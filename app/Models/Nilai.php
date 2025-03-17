<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $fillable = ['students_id', 'mapel_id', 'teacher_id', 'nilai'];

    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'students_id');
    }

    public function mapel()
    {
        return $this->belongsTo(\App\Models\Mapel::class, 'mapel_id');
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
}
