<?php

namespace App\Http\Controllers\Admin;

// DIBAIKI: Mengarahkan ke Controller dasar Laravel yang benar
use App\Http\Controllers\Controller; 
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Film;
use App\Models\User;
class BookingController extends Controller
{
    public function index(): View
    {
        // Mengambil data untuk statistik
        $totalFilms = Film::count();
        $totalBookings = Booking::count();
        $totalUsers = User::count();
        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_price');

        // Mengambil 5 booking terbaru untuk ditampilkan di tabel
        $latestBookings = Booking::with('user', 'schedule.film')
                                 ->latest()
                                 ->take(5)
                                 ->get();

        // Mengirim semua data yang diperlukan ke view
        return view('dashboard', [
            'totalFilms' => $totalFilms,
            'totalBookings' => $totalBookings,
            'totalUsers' => $totalUsers,
            'totalRevenue' => $totalRevenue,
            'latestBookings' => $latestBookings,
        ]);
    }

    /**
     * Menyiapkan dan menampilkan halaman pemilihan kursi untuk jadwal tertentu.
     *
     * @param Schedule $schedule Model Schedule yang diambil otomatis dari URL.
     * @return View
     */
    public function seats(Schedule $schedule): View
    {
        // 1. Eager load relasi untuk efisiensi query
        $schedule->load('film', 'studio');
        
        // 2. Ambil semua template kursi untuk studio yang sesuai dengan jadwal.
        $seats = Seat::where('studio_id', $schedule->studio_id)
            ->orderBy('seat_row')
            ->orderBy('seat_number')
            ->get();

        // 3. Ambil semua ID kursi yang SUDAH DIPESAN KHUSUS UNTUK JADWAL INI.
        $booked_seat_ids = DB::table('booking_seats')
                            ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.id')
                            ->where('bookings.schedule_id', $schedule->id)
                            ->whereIn('bookings.status', ['confirmed', 'completed']) // Hanya booking yang valid
                            ->pluck('booking_seats.seat_id')
                            ->toArray();

        // 4. Kirim semua data yang diperlukan ke view.
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
            foreach ($request->seat_ids as $seat_id) {
                 // Pencegahan double-booking di level database
                $isBooked = DB::table('booking_seats')
                    ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.id')
                    ->where('bookings.schedule_id', $schedule->id)
                    ->where('booking_seats.seat_id', $seat_id)
                    ->whereIn('bookings.status', ['confirmed', 'completed'])
                    ->exists();

                if ($isBooked) {
                    throw new \Exception("Kursi ID {$seat_id} sudah dipesan.");
                }

                $booking->seats()->attach($seat_id, ['price_at_booking' => $schedule->price]);
            }

            // 5. Jika semua berhasil, konfirmasi transaksi.
            DB::commit();

            // 6. Redirect ke halaman riwayat dengan pesan sukses.
            return redirect()->route('booking.history')->with('success', 'Booking berhasil! Kode Booking Anda: ' . $booking->booking_code);

        } catch (\Exception $e) {
            // 7. Jika terjadi error di salah satu langkah, batalkan semua query.
            DB::rollBack();

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
        $bookings = $user->bookings()
            ->with('schedule.film', 'schedule.studio', 'seats')
            ->latest() // Urutkan dari yang terbaru
            ->get();

        return view('customer.booking-history', compact('bookings'));
    }
}
