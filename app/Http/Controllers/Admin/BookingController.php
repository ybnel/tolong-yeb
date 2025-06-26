<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    /**
     * Menyiapkan dan menampilkan halaman pemilihan kursi untuk jadwal tertentu.
     *
     * @param Schedule $schedule Model Schedule yang diambil otomatis dari URL.
     * @return View
     */
    public function seats(Schedule $schedule): View
    {
        // 1. Ambil semua template kursi untuk studio yang sesuai dengan jadwal.
        // Diurutkan berdasarkan baris dan nomor untuk tampilan yang teratur.
        $seats = Seat::where('studio_id', $schedule->studio_id)
            ->orderBy('seat_row')
            ->orderBy('seat_number')
            ->get();

        // 2. Kunci pencegahan double-booking:
        // Ambil semua ID kursi yang SUDAH DIPESAN KHUSUS UNTUK JADWAL INI.
        $booked_seat_ids = DB::table('booking_seats')
                            ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.id')
                            ->where('bookings.schedule_id', $schedule->id)
                            ->whereIn('bookings.status', ['confirmed', 'completed']) // Hanya booking yang valid
                            ->pluck('booking_seats.seat_id')
                            ->toArray();

        // 3. Kirim semua data yang diperlukan ke view.
        // Tim frontend akan menggunakan 'booked_seat_ids' untuk menonaktifkan kursi yang sudah terisi.
        return view('customer.seat-selection', compact('schedule', 'seats', 'booked_seat_ids'));
    }

    /**
     * Memvalidasi dan menyimpan data pemesanan baru ke database.
     *
     * @param Request $request Data yang dikirim dari form pemilihan kursi.
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input dasar.
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_ids' => 'required|array|min:1',
            'seat_ids.*' => 'exists:seats,id', // Pastikan setiap ID kursi valid
        ]);

        $schedule = Schedule::findOrFail($request->schedule_id);
        $total_price = count($request->seat_ids) * $schedule->price;

        // 2. Gunakan Database Transaction.
        // Ini memastikan bahwa semua query (membuat booking & menyimpan kursi) berhasil.
        // Jika salah satu gagal, semua akan dibatalkan (rollback) untuk mencegah data korup.
        DB::beginTransaction();
        try {
            // 3. Buat record utama di tabel 'bookings'.
            $booking = Booking::create([
                'user_id' => Auth::id(), // ID user yang sedang login
                'schedule_id' => $schedule->id,
                'booking_code' => 'INV-' . strtoupper(Str::random(10)), // Buat kode booking unik
                'total_price' => $total_price,
                'status' => 'confirmed' // Langsung 'confirmed' untuk menyederhanakan alur
            ]);

            // 4. Simpan setiap kursi yang dipilih ke tabel pivot 'booking_seats'.
            // attach() adalah helper Eloquent untuk relasi many-to-many.
            foreach ($request->seat_ids as $seat_id) {
                // Simpan juga harga tiket saat itu di tabel pivot.
                $booking->seats()->attach($seat_id, ['price_at_booking' => $schedule->price]);
            }

            // 5. Jika semua berhasil, konfirmasi transaksi.
            DB::commit();

            // 6. Redirect ke halaman riwayat dengan pesan sukses.
            return redirect()->route('booking.history')->with('success', 'Booking berhasil! Kode Booking Anda: ' . $booking->booking_code);

        } catch (\Exception $e) {
            // 7. Jika terjadi error di salah satu langkah, batalkan semua query.
            DB::rollBack();

            // Tampilkan error untuk debugging (opsional, hapus di production)
            // return back()->with('error', $e->getMessage());

            // 8. Redirect kembali ke halaman kursi dengan pesan error.
            return redirect()->route('booking.seats', ['schedule' => $schedule->id])->with('error', 'Booking gagal, kursi yang Anda pilih mungkin sudah dipesan orang lain. Silakan coba lagi.');
        }
    }

    /**
     * Menampilkan riwayat pemesanan milik user yang sedang login.
     *
     * @return View
     */
    public function history(): View
    {
        /** @var \App\Models\User $user */
         $user = Auth::user();

        // Ambil semua booking milik user yang sedang login.
        // `with()` digunakan untuk eager loading, agar tidak terjadi N+1 problem.
        $bookings=$user->bookings()
        //  $bookings = Auth::user()->bookings()
            ->with('schedule.film', 'schedule.studio', 'seats')
            ->latest() // Urutkan dari yang terbaru
            ->get();

        return view('customer.booking-history', compact('bookings'));
    }
}
