<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request; // <-- Import Request
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FilmController extends Controller
{
    /**
     * Menampilkan daftar semua film dengan fungsionalitas pencarian.
     */
    public function index(Request $request): View
    {
        // 1. Ambil kata kunci pencarian dari request
        $search = $request->input('search');

        // 2. Buat query dasar dan terapkan filter jika ada input pencarian
        $films = Film::query()
            ->when($search, function ($query, $search) {
                // Cari berdasarkan judul ATAU genre
                return $query->where('title', 'like', "%{$search}%")
                             ->orWhere('genre', 'like', "%{$search}%");
            })
            ->latest() // Urutkan dari yang terbaru
            ->paginate(10); // Paginasi hasil

        // 3. Kirim data ke view
        return view('dashboard.dashboard_films', compact('films'));
    }

    /**
     * Menampilkan form untuk menambah film baru.
     */
    public function create(): View
    {
        return view('dashboard.dashboard_films_form');
    }

    /**
     * Menyimpan data dari form tambah ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_minutes' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'poster_image_url' => 'nullable|url',
        ]);

        Film::create($validated);
        return redirect()->route('admin.films.index')->with('success', 'Film berhasil ditambahkan.');
    }
    
    /**
     * Menampilkan form untuk mengedit film.
     */
    public function edit(Film $film): View
    {
        return view('dashboard.dashboard_films_form', compact('film'));
    }

    /**
     * Menyimpan data dari form edit ke database.
     */
    public function update(Request $request, Film $film): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_minutes' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'poster_image_url' => 'nullable|url',
        ]);

        $film->update($validated);
        return redirect()->route('admin.films.index')->with('success', 'Film berhasil diperbarui.');
    }

    /**
     * Menghapus film dari database.
     */
    public function destroy(Film $film): RedirectResponse
    {
        // Tambahkan validasi untuk mencegah penghapusan jika film masih memiliki jadwal
        if ($film->schedules()->exists()) {
            return redirect()->route('admin.films.index')->with('error', 'Film tidak dapat dihapus karena masih memiliki jadwal aktif.');
        }

        $film->delete();
        return redirect()->route('admin.films.index')->with('success', 'Film berhasil dihapus.');
    }
}
