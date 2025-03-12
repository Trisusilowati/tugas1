<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');

    Route::get('search', [SearchController::class, 'index'])->name('search');

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


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
