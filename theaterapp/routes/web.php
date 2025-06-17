<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController; // Pastikan ini adalah BookingController untuk sisi pengguna

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute Default Laravel Breeze
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Rute Halaman Depan/Navigasi Umum (dari Header) ---
Route::get('/now-showing', function () { return view('movies.now-showing'); })->name('now-showing');
Route::get('/coming-soon', function () { return view('movies.coming-soon'); })->name('coming-soon');
Route::get('/locations', function () { return view('locations.index'); })->name('locations');
Route::get('/gift-cards', function () { return view('gift-cards.index'); })->name('gift-cards');
Route::get('/promotions', function () { return view('promotions.index'); })->name('promotions');


Route::get('/movies/{schedule}/select-seats', [BookingController::class, 'seats'])->name('movies.select-seats');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/history', [BookingController::class, 'history'])->name('booking.history');

Route::get('/payment-summary', function () {
    return view('bookings.payment-summary');
})->name('bookings.payment-summary');

Route::post('/payment-summary', function () {
    return redirect()->route('home')->with('success', 'Pembayaran berhasil diproses (ini placeholder)!');
})->name('bookings.process-payment');


// --- Rute Admin ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Asumsi ada view admin.dashboard
    })->name('dashboard');

    Route::get('/settings', function () {
        return view('admin.settings'); // Asumsi ada view admin.settings
    })->name('settings');

    // Sertakan file rute admin eksternal
    require __DIR__.'/admin.php';
});


// Rute autentikasi Laravel Breeze (jangan diubah)
require __DIR__.'/auth.php';