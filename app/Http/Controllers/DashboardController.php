<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Mapel;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Jika database tidak ada, gunakan data statis
        $users = DB::table('users')->count(); // Data User
    $teachers = DB::table('teacher')->count(); // Data Guru
    $students = DB::table('students')->count(); // Data Siswa
    $subjects = DB::table('mapel')->count(); // Data Mata Pelajaran

        
        return view('backend.dashboard.index', compact('users', 'teachers', 'students', 'subjects'));
    }



}
