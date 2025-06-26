<?php

namespace Database\Seeders;

use App\Models\Seat;
use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studios = [
            ['name' => 'Studio 1', 'total_seats' => 60],
            ['name' => 'Studio 2', 'total_seats' => 80],
            ['name' => 'Studio 3 Dolby Atmos', 'total_seats' => 100],
        ];

        foreach ($studios as $studioData) {
            $studio = Studio::create($studioData);
            $this->generateSeats($studio);
        }
    }

    /**
     * Fungsi helper untuk men-generate kursi untuk sebuah studio.
     */
    private function generateSeats(Studio $studio)
    {
        // Contoh layout kursi: Baris A-F, Nomor 1-10
        $rows = ['A', 'B', 'C', 'D', 'E', 'F'];
        $numbers = range(1, 10);

        foreach ($rows as $row) {
            foreach ($numbers as $number) {
                Seat::create([
                    'studio_id' => $studio->id,
                    'seat_row' => $row,
                    'seat_number' => $number,
                ]);
            }
        }
    }
    
}
