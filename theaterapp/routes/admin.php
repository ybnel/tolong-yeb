<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FilmController; // <-- Import controller
use App\Http\Controllers\Admin\ScheduleController;

// Rute resource untuk Film
Route::resource('films', FilmController::class);
Route::resource('schedules', ScheduleController::class);