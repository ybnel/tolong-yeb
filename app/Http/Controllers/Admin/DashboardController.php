<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Film;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // ... (Logika pengambilan data sama seperti jawaban sebelumnya)
        $totalFilms = Film::count();
        $totalBookings = Booking::count();
        $totalUsers = User::whereHas('role', function ($query) {
            $query->where('name', 'Customer');
        })->count();
        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_price');

        $recentBookings = Booking::with(['user', 'schedule.film'])
                                ->latest()
                                ->take(5)
                                ->get();

        $salesData = Booking::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('sum(total_price) as total')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->whereIn('status', ['confirmed', 'completed'])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
            
        // Mengirim semua data ke view yang benar
        // Nama view disesuaikan dengan struktur folder Anda: 'dashboard.dashboard'
        return view('dashboard.dashboard', [
            'totalFilms' => $totalFilms,
            'totalBookings' => $totalBookings,
            'totalUsers' => $totalUsers,
            'totalRevenue' => $totalRevenue,
            'recentBookings' => $recentBookings,
            'salesData' => $salesData,
        ]);
    }
}