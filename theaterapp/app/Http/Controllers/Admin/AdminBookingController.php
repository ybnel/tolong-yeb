<?php

namespace App\Http\Controllers\Admin; // <-- PASTIKAN NAMESPACE INI BENAR!

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Booking; // Tambahkan import model jika Anda menggunakannya

class AdminBookingController extends Controller // <-- PASTIKAN NAMA KELAS INI BENAR!
{
    public function index()
    {
        // Logika untuk menampilkan daftar booking di admin panel
        // Ini adalah data placeholder untuk admin bookings
        $bookings = [
            (object)['id' => 1, 'booking_code' => 'INV-ABCDE12345', 'user_name' => 'Dicky Indra', 'film_title' => 'The Matrix', 'total_price' => 50000, 'status' => 'confirmed'],
            (object)['id' => 2, 'booking_code' => 'INV-FGHIJ67890', 'user_name' => 'Jane Doe', 'film_title' => 'Inception', 'total_price' => 75000, 'status' => 'pending'],
        ];
        return view('admin.bookings.index', compact('bookings'));
    }

    // Metode CRUD lainnya (create, store, show, edit, update, destroy) untuk admin bookings
}