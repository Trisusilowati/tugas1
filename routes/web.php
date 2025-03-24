<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('welcome');
});
// ==================== Pendaftaran (Bisa Diakses Tanpa Login) ====================
Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create'); // Form Pendaftaran
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store'); // Simpan Pendaftaran

// ==================== Routes yang Memerlukan Login ====================


Route::middleware('auth', 'verified')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Route::get('search', [SearchController::class, 'index'])->name('search');

    Route::prefix('nilai')->group(function () {
        Route::get('/', [NilaiController::class, 'index'])->name('nilai');
        Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
        Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
        Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::get('/nilai/export-pdf', [NilaiController::class, 'exportPdf'])->name('nilai.export.pdf');

    });


    Route::prefix('mapel')->group(function(){
        Route::get('/', [MapelController::class, 'index'])->name('mapel');
        Route::get('/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
        Route::post('/store', [MapelController::class, 'store'])->name('mapel.store');
        Route::get  ('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::delete ('/mapel/{id}', [MapelController::class, 'delete'])->name('mapel.delete');
        Route::put  ('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
        
    });

    Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher');
        Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get  ('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put  ('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
        Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    });

    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('students');
        Route::resource('students', StudentController::class);
        Route::get('/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/store', [StudentController::class, 'store'])->name('students.store');
        Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::get('/search', [StudentController::class, 'search'])->name('search');
    });

    Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get  ('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put  ('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');



});

// Pendaftaran (Admin)
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran'); // Hanya Admin
Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
Route::put('/pendaftaran/update/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
Route::delete('/pendaftaran/delete/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
Route::post('/pendaftaran/{id}/terima', [PendaftaranController::class, 'terima'])->name('pendaftaran.terima');
Route::post('/pendaftaran/{id}/tolak', [PendaftaranController::class, 'tolak'])->name('pendaftaran.tolak');
Route::put('pendaftaran/update-status/{id}', [PendaftaranController::class, 'updateStatus'])->name('pendaftaran.update.status');
Route::get('pendaftaran/exportpdf/{id?}', [PendaftaranController::class, 'exportPdf'])->name('pendaftaran.export.pdf');








    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
