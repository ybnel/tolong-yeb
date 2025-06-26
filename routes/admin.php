<?php

use Illuminate\Support\Facades\Route;
// Import semua controller yang akan digunakan di file ini
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilmController;    // <-- Pastikan FilmController ada di sini
use App\Http\Controllers\Admin\ScheduleController; // <-- Pastikan ScheduleController ada di sini
// Tambahkan import controller lain untuk master data (StudioController, UserController, dll.) di sini

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group, automatically applied by bootstrap/app.php.
|
*/

// Dashboard Admin (URL: /admin/dashboard, Name: admin.dashboard)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Resource untuk Film (URL: /admin/films, Name: admin.films.*)
// Ini akan membuat: /admin/films (index), /admin/films/create, /admin/films/{film} (show), dll.
Route::resource('films', FilmController::class);

// Route Resource untuk Schedule (URL: /admin/schedules, Name: admin.schedules.*)
Route::resource('schedules', ScheduleController::class);

// Contoh Route Resource buat Master Data lainnya (kalo sudah ada controllernya)
// Route::resource('studios', StudioController::class);
// Route::resource('users', UserController::class); // buat manajemen user admin
// Route::resource('roles', RoleController::class); // buat manajemen role admin