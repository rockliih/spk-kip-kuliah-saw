<?php

use App\Http\Controllers\CollegeStudentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// LIMITASI : Maksimal submit form 5x dalam 1 menit
Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/students', [CollegeStudentController::class, 'store'])->name('students.store');
    Route::put('/students/{student}', [CollegeStudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [CollegeStudentController::class, 'destroy'])->name('students.destroy');
});

// Rute Dashboard Perankingan SAW
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rute Halaman Tentang Aplikasi & Metode SAW
Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute Lengkap CRUD Kelola Data Mahasiswa
Route::resource('students', CollegeStudentController::class);
