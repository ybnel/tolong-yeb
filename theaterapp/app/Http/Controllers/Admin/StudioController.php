<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Studio; // Pastikan Anda memiliki model Studio

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Mengambil data dari database
    $studios = Studio::latest()->paginate(10); // Ambil 10 studio terbaru per halaman

    return view('admin.studios.index', compact('studios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // View untuk form penambahan studio baru
        return view('admin.studios.create'); // Anda perlu membuat file create.blade.php ini
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic untuk validasi dan menyimpan data studio baru
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'template' => 'required|string|max:255', // Asumsi ada template kursi
            // 'location' => 'required|string|max:255', // Jika Anda memiliki kolom lokasi
        ]);

        // Studio::create($validated); // Aktifkan jika Anda punya model Studio
        return redirect()->route('admin.studios.index')->with('success', 'Studio berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $studio = Studio::findOrFail($id); // Aktifkan jika Anda punya model Studio
        return view('admin.studios.show', compact('studio')); // Anda perlu membuat file show.blade.php ini
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $studio = Studio::findOrFail($id); // Aktifkan jika Anda punya model Studio
        return view('admin.studios.edit', compact('studio')); // Anda perlu membuat file edit.blade.php ini
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logic untuk validasi dan update data studio
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'template' => 'required|string|max:255',
            // 'location' => 'required|string|max:255',
        ]);

        // $studio = Studio::findOrFail($id); // Aktifkan jika Anda punya model Studio
        // $studio->update($validated); // Aktifkan jika Anda punya model Studio
        return redirect()->route('admin.studios.index')->with('success', 'Studio berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $studio = Studio::findOrFail($id); // Aktifkan jika Anda punya model Studio
        // $studio->delete(); // Aktifkan jika Anda punya model Studio
        return redirect()->route('admin.studios.index')->with('success', 'Studio berhasil dihapus.');
    }
}