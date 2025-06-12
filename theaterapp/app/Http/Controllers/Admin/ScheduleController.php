<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Film;   // <-- Import model Film
use App\Models\Studio; // <-- Import model Studio
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Eager loading relasi 'film' dan 'studio' untuk efisiensi query
        $schedules = Schedule::with(['film', 'studio'])->latest()->paginate(10);
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        // Kirim data film dan studio ke view untuk dropdown
        $films = Film::all();
        $studios = Studio::all();
        return view('admin.schedules.form', compact('films', 'studios'));
    }

    public function store(Request $request)
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

    public function edit(Schedule $schedule)
    {
        $films = Film::all();
        $studios = Studio::all();
        return view('admin.schedules.form', compact('schedule', 'films', 'studios'));
    }

    public function update(Request $request, Schedule $schedule)
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

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}