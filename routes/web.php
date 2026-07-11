<?php

use App\Http\Controllers\CollegeStudentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Rute Dashboard Perankingan SAW
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rute Halaman Tentang Aplikasi & Metode SAW
Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute Lengkap CRUD Kelola Data Mahasiswa
Route::resource('students', CollegeStudentController::class);
