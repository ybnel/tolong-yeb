<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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
        
        // --- RUTE BOOKING UNTUK CUSTOMER DITAMBAHKAN DI SINI ---
        // Rute-rute ini memerlukan pengguna untuk login.

        // Menampilkan halaman pemilihan kursi untuk jadwal tertentu
        Route::get('/booking/schedule/{schedule}', [BookingController::class, 'seats'])->name('booking.seats');
        
        // Memproses data pemesanan yang dikirim dari form
        Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
        
        // Menampilkan halaman riwayat pemesanan pengguna
        Route::get('/my-bookings', [BookingController::class, 'history'])->name('booking.history');
        // --- AKHIR DARI RUTE BOOKING ---

    });

    Route::get('/schedules/{film}', function (Film $film) {
        $schedules = $film->schedules()->with('studio')->latest()->get();
        return view('customer.schedule-list', compact('film', 'schedules'));
    })->name('schedules.list');

    // Tahap 1: Menampilkan halaman pemilihan kursi
    Route::get('/booking/seats/{schedule}', [BookingController::class, 'showSeatSelection'])->name('booking.seats');
    
    // Tahap 2: Memproses kursi yang dipilih & menyimpan ke session
    Route::post('/booking/process-seats', [BookingController::class, 'processSeats'])->name('booking.processSeats');
    
    // Tahap 3: Menampilkan halaman ringkasan pembayaran (versi kita)
    Route::get('/booking/payment', [BookingController::class, 'showPaymentPage'])->name('booking.payment.show');

    // Tahap 4: Memproses pembayaran akhir & menyimpan ke database
    Route::post('/booking/pay', [BookingController::class, 'processPayment'])->name('booking.pay');

    // Tahap 5: Menampilkan halaman riwayat booking
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');

    

    
    // 3. Grup Khusus untuk Rute Admin
    // Middleware 'auth', 'verified', dan 'role:admin' sudah otomatis diterapkan
    // oleh grup 'admin' yang kita definisikan di bootstrap/app.php.
    Route::prefix('admin')
          ->name('admin.')
          ->middleware('admin')
          ->group(function() {
                require __DIR__.'/admin.php';
          
          });

});