<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Menampilkan daftar semua film
    public function index()
    {
        $films = Film::latest()->paginate(10); // Ambil 10 film terbaru per halaman
        return view('admin.films.index', compact('films'));
    }

    // Menampilkan form untuk menambah film baru
    public function create()
    {
        return view('admin.films.form');
    }

    // Menyimpan data dari form tambah ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_minutes' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'poster_image_url' => 'nullable|url',
        ]);

        // Buat record baru di tabel 'films'
        Film::create($validated);
        return redirect()->route('admin.films.index')->with('success', 'Film berhasil ditambahkan.');
    }

    // Menampilkan detail satu film
    public function show(Film $film)
    {
        return view('admin.films.show', compact('film'));
    }

    // Menampilkan form untuk mengedit film
    public function edit(Film $film)
    {
        return view('admin.films.form', compact('film'));
    }

    // Menyimpan data dari form edit ke database
    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_minutes' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'poster_image_url' => 'nullable|url',
        ]);

        // Update record film yang ada
        $film->update($validated);
        return redirect()->route('admin.films.index')->with('success', 'Film berhasil diperbarui.');
    }

    // Menghapus film dari database
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('admin.films.index')->with('success', 'Film berhasil dihapus.');
    }
}