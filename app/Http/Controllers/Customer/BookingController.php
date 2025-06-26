<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    public function showSeatSelection(Schedule $schedule)
    {
        $seats = Seat::where('studio_id', $schedule->studio_id)->orderBy('seat_row')->orderBy('seat_number')->get();
        $booked_seat_ids = DB::table('booking_seats')
                            ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.id')
                            ->where('bookings.schedule_id', $schedule->id)
                            ->whereIn('bookings.status', ['confirmed', 'completed'])
                            ->pluck('booking_seats.seat_id')
                            ->toArray();

        return view('customer.seat-selection', [
            'schedule' => $schedule,
            'seats' => $seats,
            'booked_seat_ids' => $booked_seat_ids,
        ]);
    }

    /**
     * TAHAP 3: Memproses kursi yang dipilih & menyimpannya ke session.
     */
    public function processSeats(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_ids' => 'required|array|min:1',
            'seat_ids.*' => 'exists:seats,id',
        ]);
        
        session(['booking_details' => [
            'schedule_id' => $request->schedule_id,
            'seat_ids' => $request->seat_ids,
        ]]);

        return redirect()->route('booking.payment.show');
    }

    /**
     * TAHAP 4: Menampilkan halaman ringkasan pembayaran.
     */
    public function showPaymentPage()
    {
        $bookingDetails = session('booking_details');
        if (!$bookingDetails) {
            return redirect()->route('home')->with('error', 'Sesi booking tidak ditemukan.');
        }

        $schedule = Schedule::with('film', 'studio')->findOrFail($bookingDetails['schedule_id']);
        $seats = Seat::find($bookingDetails['seat_ids']);
        $total_price = count($seats) * $schedule->price;

        return view('customer.payment-summary', compact('schedule', 'seats', 'total_price'));
    }

    /**
     * TAHAP 5: Memproses pembayaran dan menyimpan booking ke DB.
     */
    public function processPayment(Request $request)
    {
        $bookingDetails = session('booking_details');
        if (!$bookingDetails) {
            return redirect()->route('home')->with('error', 'Sesi booking Anda telah berakhir.');
        }

        $schedule = Schedule::findOrFail($bookingDetails['schedule_id']);
        $seatIds = $bookingDetails['seat_ids'];
        $totalPrice = count($seatIds) * $schedule->price;

        DB::beginTransaction();
        try {
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'schedule_id' => $schedule->id,
                'booking_code' => 'INV-' . strtoupper(Str::random(10)),
                'total_price' => $totalPrice,
                'status' => 'confirmed'
            ]);

            $booking->seats()->attach($seatIds, ['price_at_booking' => $schedule->price]);

            DB::commit();
            session()->forget('booking_details');
            return redirect()->route('booking.history')->with('success', 'Booking berhasil! Kode Booking Anda: ' . $booking->booking_code);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan. Kursi yang Anda pilih mungkin sudah dipesan. Silakan coba lagi.');
        }
    }
    
    /**
     * TAHAP 6: Menampilkan riwayat booking.
     */
    public function history()
    {
        $user = Auth::user();
        $bookings = $user->bookings()
            ->with('schedule.film', 'schedule.studio', 'seats')
            ->latest()
            ->get();

        return view('customer.booking-history', compact('bookings'));
    }
}