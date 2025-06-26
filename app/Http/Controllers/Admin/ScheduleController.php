<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Film;
use App\Models\Studio;
use Illuminate\Http\Request; // Import Request
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ScheduleController extends Controller
{
    /**
     * Menampilkan daftar semua jadwal dengan fungsionalitas pencarian.
     */
    public function index(Request $request): View
    {
        // 1. Ambil kata kunci pencarian dari request
        $search = $request->input('search');

        // 2. Buat query dasar
        $schedulesQuery = Schedule::with(['film', 'studio']);

        // 3. Terapkan filter pencarian jika ada input
        if ($search) {
            $schedulesQuery->where(function ($query) use ($search) {
                // Cari berdasarkan judul film
                $query->whereHas('film', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                })
                // Atau cari berdasarkan nama studio
                ->orWhereHas('studio', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            });
        }

        // 4. Ambil hasil, urutkan, dan paginasi
        $schedules = $schedulesQuery->latest()->paginate(10);

        // 5. Kirim data ke view
        return view('dashboard.dashboard_schedules', compact('schedules'));
    }

    /**
     * Menampilkan form untuk membuat jadwal baru.
     */
    public function create(): View
    {
        $films = Film::orderBy('title')->get();
        $studios = Studio::orderBy('name')->get();
        return view('dashboard.dashboard_schedules_form', compact('films', 'studios'));
    }

    // ... (Metode store, edit, update, destroy lainnya tidak perlu diubah)
    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'studio_id' => 'required|exists:studios,id',
            'show_time' => 'required|date',
            'price' => 'required|numeric|min:0',
        ]);

        Schedule::create($validated);
        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule): View
    {
        $films = Film::orderBy('title')->get();
        $studios = Studio::orderBy('name')->get();
        return view('dashboard.dashboard_schedules_form', compact('schedule', 'films', 'studios'));
    }

    public function update(Request $request, Schedule $schedule): RedirectResponse
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'studio_id' => 'required|exists:studios,id',
            'show_time' => 'required|date',
            'price' => 'required|numeric|min:0',
        ]);

        $schedule->update($validated);
        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule): RedirectResponse
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
