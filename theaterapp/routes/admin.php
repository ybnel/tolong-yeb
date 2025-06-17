<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AdminBookingController; // <-- Pastikan ini menunjuk ke AdminBookingController
use App\Http\Controllers\Admin\StudioController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::resource('films', FilmController::class);
Route::resource('showtimes', ScheduleController::class);

Route::resource('bookings', AdminBookingController::class); // <-- Pastikan ini menggunakan AdminBookingController::class

Route::resource('studios', StudioController::class);

Route::get('/users', function () {
    return view('admin.users.index');
})->name('users.index');