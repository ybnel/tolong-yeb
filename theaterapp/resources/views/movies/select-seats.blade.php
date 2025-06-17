@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center py-5 px-4">
    <div class="max-w-4xl w-full">
        <p class="text-[#9caaba] text-sm font-normal leading-normal mb-2">
            <a href="#">Movies</a> / <a href="#">The Matrix</a> / Select Seats
        </p>
        <h1 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] mb-1">The Matrix</h1>
        <p class="text-[#9caaba] text-sm font-normal leading-normal mb-6">Select Seats</p>

        <div class="bg-[#1e2329] rounded-xl p-8 mb-8 flex justify-center items-center h-[500px] overflow-auto">
            {{-- Placeholder for actual seat map image or interactive SVG --}}
            {{-- Menggunakan placeholder dari gambar yang Anda berikan --}}
            <img src="{{ asset('path/to/image_20d25b.jpg') }}" alt="Seat Map Placeholder" class="max-w-full h-auto rounded-lg">
            {{-- 
                Untuk implementasi nyata, Anda akan menggunakan SVG atau elemen div yang dirender secara dinamis untuk kursi:
                <div class="grid grid-cols-10 gap-2">
                    @php
                        $seats = [
                            // Contoh data kursi: 'A1' => 'available', 'A2' => 'booked'
                            'A1' => 'available', 'A2' => 'available', 'A3' => 'booked', 'A4' => 'available', 'A5' => 'available',
                            'B1' => 'available', 'B2' => 'booked', 'B3' => 'available', 'B4' => 'available', 'B5' => 'available',
                            // ... dan seterusnya untuk baris lainnya
                        ];
                    @endphp
                    @foreach ($seats as $seatName => $status)
                        <div class="size-8 rounded-md flex items-center justify-center cursor-pointer
                            {{ $status === 'available' ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 cursor-not-allowed opacity-50' }}
                            text-white text-xs font-bold"
                            data-seat="{{ $seatName }}" data-status="{{ $status }}">
                            {{ $seatName }}
                        </div>
                    @endforeach
                </div>
            --}}
        </div>

        <div class="bg-[#1e2329] rounded-xl p-6 mb-6">
            <h3 class="text-white text-lg font-bold mb-3">Select Seats</h3>
            <p class="text-[#9caaba] text-sm font-normal leading-normal">
                Choose your seats for The Matrix. Seats marked in green are available, while those in red are already booked. Select your preferred seats by clicking on them.
            </p>
        </div>

        <div class="flex justify-end mt-4">
            <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Book Seats</span>
            </button>
        </div>
    </div>
</div>
@endsection
