<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudioController extends Controller
{
    /**
     * Menampilkan daftar semua studio.
     */
    public function index(): View
    {
        $studios = Studio::latest()->paginate(10);
        return view('dashboard.dashboard_studios', compact('studios'));
    }

    /**
     * Menampilkan form untuk membuat studio baru.
     */
    public function create(): View
    {
        return view('dashboard.dashboard_studios_form');
    }

    /**
     * Menyimpan studio baru dan otomatis membuat template kursinya.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:studios,name',
            'total_seats' => 'required|integer|min:1',
        ]);
        
        $studio = Studio::create($validated);

        // Panggil helper untuk membuat kursi berdasarkan kapasitas
        $this->generateSeatsForStudio($studio);

        return redirect()->route('admin.studios.index')->with('success', 'Studio berhasil ditambahkan beserta template kursinya.');
    }

    /**
     * Menampilkan form untuk mengedit studio.
     */
    public function edit(Studio $studio): View
    {
        return view('dashboard.dashboard_studios_form', compact('studio'));
    }
    
    /**
     * Memperbarui data studio dan membuat ulang template kursinya.
     */
    public function update(Request $request, Studio $studio): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:studios,name,'.$studio->id,
            'total_seats' => 'required|integer|min:1',
        ]);

        $studio->update($validated);

        // Panggil helper untuk menghapus dan membuat ulang kursi
        $this->regenerateSeats($studio);

        return redirect()->route('admin.studios.index')->with('success', 'Studio berhasil diperbarui beserta template kursinya.');
    }

    /**
     * Menghapus studio dari database.
     */
    public function destroy(Studio $studio): RedirectResponse
    {
        // Validasi untuk mencegah penghapusan jika studio masih memiliki jadwal aktif
        if ($studio->schedules()->exists()) {
            return redirect()->route('admin.studios.index')->with('error', 'Studio tidak dapat dihapus karena masih memiliki jadwal aktif.');
        }
        
        // Hapus kursi terkait terlebih dahulu
        $studio->seats()->delete();
        // Hapus studio
        $studio->delete();
        
        return redirect()->route('admin.studios.index')->with('success', 'Studio berhasil dihapus.');
    }
    
    /**
     * Menampilkan halaman denah kursi (seating template).
     */
    public function seatingTemplate(Studio $studio): View
    {
        $seatLayout = $studio->seats()->orderBy('seat_row', 'asc')->orderBy('seat_number', 'asc')->get()->groupBy('seat_row');
        return view('dashboard.dashboard_seating_template', compact('studio', 'seatLayout'));
    }

    /**
     * Menghapus kursi lama dan membuat ulang template kursi untuk studio.
     */
    public function regenerateSeatingTemplate(Studio $studio): RedirectResponse
    {
        $this->regenerateSeats($studio);
        return redirect()->route('admin.studios.seatingTemplate', $studio)->with('success', 'Denah kursi berhasil dibuat ulang!');
    }

    /**
     * Fungsi helper untuk membuat kursi secara otomatis,
     * dengan logika pintu masuk yang cerdas dan tata letak terbalik.
     */
    private function generateSeatsForStudio(Studio $studio): void
    {
        // Parameter untuk denah kursi
        $seatsPerRow = 20; // Maksimal 20 kursi per baris
        $minSeatsForEntrance = 60; // Hanya buat pintu masuk jika kapasitas > 60
        
        // Definisikan area pintu masuk (baris dan nomor kursi yang akan dilewati)
        $entranceRows = ['A', 'B', 'C']; // Baris yang akan menjadi pintu masuk (paling bawah)
        $entranceSeatCount = 2; // Jumlah kursi yang dikosongkan per baris untuk pintu

        // Hitung jumlah baris yang dibutuhkan
        $numberOfRows = ceil($studio->total_seats / $seatsPerRow);
        $seatCounter = 0;
        
        // Logika untuk hanya membuat pintu masuk jika studio cukup besar
        $createEntrance = $studio->total_seats > $minSeatsForEntrance;

        for ($i = 0; $i < $numberOfRows; $i++) {
            $rowLetter = chr(65 + $i); // Menghasilkan 'A', 'B', 'C', ...
            for ($j = 1; $j <= $seatsPerRow; $j++) {
                if ($seatCounter >= $studio->total_seats) {
                    break 2; // Keluar dari kedua loop jika sudah mencapai kapasitas
                }

                $seatName = $rowLetter . $j;
                // Cek apakah kursi ini adalah bagian dari area pintu masuk
                $isEntranceSeat = in_array($rowLetter, $entranceRows) && $j <= $entranceSeatCount;

                // Lewati pembuatan kursi jika ini adalah area pintu masuk
                if ($createEntrance && $isEntranceSeat) {
                    continue;
                }
                
                Seat::create([
                    'studio_id' => $studio->id,
                    'seat_row' => $rowLetter,
                    'seat_number' => $j,
                ]);
                $seatCounter++;
            }
        }
    }

    /**
     * Fungsi helper untuk menggabungkan logika hapus dan buat ulang.
     */
    private function regenerateSeats(Studio $studio): void
    {
        // Hapus semua kursi yang ada untuk studio ini terlebih dahulu
        $studio->seats()->delete();
        // Panggil fungsi untuk membuat kursi baru
        $this->generateSeatsForStudio($studio);
    }
}
