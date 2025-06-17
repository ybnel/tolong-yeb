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
        $schedules = Schedule::with(['film', 'studio'])->latest()->paginate(10);
        // UBAH INI: dari 'admin.showtimes.index' menjadi 'admin.schedules.index'
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $films = Film::all();
        $studios = Studio::all();
        // UBAH INI: dari 'admin.showtimes.form' menjadi 'admin.schedules.create' (mengikuti konvensi resource)
        return view('admin.schedules.create', compact('films', 'studios'));
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
        // Rute redirect juga perlu disesuaikan dengan nama rute resource yang benar
        return redirect()->route('admin.showtimes.index')->with('success', 'Jadwal berhasil ditambahkan.'); // <--- TETAP 'admin.showtimes.index' untuk rute
    }

    public function edit(Schedule $schedule)
    {
        $films = Film::all();
        $studios = Studio::all();
        // UBAH INI: dari 'admin.showtimes.form' menjadi 'admin.schedules.edit' (mengikuti konvensi resource)
        return view('admin.schedules.edit', compact('schedule', 'films', 'studios'));
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
        // Rute redirect juga perlu disesuaikan dengan nama rute resource yang benar
        return redirect()->route('admin.showtimes.index')->with('success', 'Jadwal berhasil diperbarui.'); // <--- TETAP 'admin.showtimes.index' untuk rute
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        // Rute redirect juga perlu disesuaikan dengan nama rute resource yang benar
        return redirect()->route('admin.showtimes.index')->with('success', 'Jadwal berhasil dihapus.'); // <--- TETAP 'admin.showtimes.index' untuk rute
    }
}