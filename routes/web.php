<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah semua rute untuk aplikasi web Anda akan berada.
|
*/

// --- GRUP UTAMA DENGAN MIDDLEWARE 'web' ---
Route::middleware('web')->group(function () {

    // Halaman Publik (tidak perlu login)
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // 1. Muat SEMUA rute autentikasi terlebih dahulu
    // Ini akan mendaftarkan /login, /register, /verify-email, dll.
    require __DIR__.'/auth.php';

    // 2. Rute untuk Pengguna yang Sudah Login (Customer & Admin)
    Route::middleware(['auth', 'verified'])->group(function() {
        
        // Dashboard untuk Customer
        Route::get('/dashboard', function () {
            // Logika redirect admin sudah ada di AuthenticatedSessionController,
            // jadi route ini aman untuk menjadi dashboard customer.
            return view('dashboard');
        })->name('dashboard');

        // Halaman Profile (bisa diakses semua role)
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });
    
    // 3. Grup Khusus untuk Rute Admin
    // Middleware 'auth', 'verified', dan 'role:admin' sudah otomatis diterapkan
    // oleh grup 'admin' yang kita definisikan di bootstrap/app.php.
    Route::prefix('admin')
         ->name('admin.')
         ->middleware('admin') // Panggil grup middleware dari bootstrap/app.php
         ->group(function() {
            // Muat semua rute admin dari file terpisah
            require __DIR__.'/admin.php';
         });

});