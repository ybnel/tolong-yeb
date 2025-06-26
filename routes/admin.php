<?php

use Illuminate\Support\Facades\Route;
// Import semua controller yang akan digunakan di file ini
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudioController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group, automatically applied by bootstrap/app.php.
|
*/

// Rute untuk Admin Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute Resource untuk Manajemen Film (CRUD)
Route::resource('films', FilmController::class);

// Rute Resource untuk Manajemen Jadwal (CRUD)
Route::resource('schedules', ScheduleController::class);

// Rute Resource untuk Manajemen Studio (CRUD)
Route::resource('studios', StudioController::class);

Route::get('/studios/{studio}/seating-template', [StudioController::class, 'seatingTemplate'])->name('studios.seatingTemplate');
Route::post('/studios/{studio}/regenerate-template', [StudioController::class, 'regenerateSeatingTemplate'])->name('studios.seatingTemplate.regenerate');

// Contoh Route Resource buat Master Data lainnya (kalo sudah ada controllernya)
// Route::resource('users', UserController::class);
// Route::resource('roles', RoleController::class);
