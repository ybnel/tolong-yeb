@extends('layouts.admin') {{-- Menggunakan layout admin Anda --}}

@section('content')
    <div class="flex-1 p-8">
        <h1 class="text-white text-3xl font-bold mb-6">Admin Dashboard</h1>
        <p class="text-[#9caaba] mb-8">Selamat datang di panel administrasi Cineplex, {{ Auth::user()->name }}! Gunakan menu di samping untuk mengelola data operasional bioskop Anda.</p>
        
        {{-- Bagian Ringkasan Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Card Total Movies --}}
            <div class="bg-[#283039] rounded-xl p-6 shadow-lg flex flex-col items-start">
                <div class="text-white mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M224,216H183.36A103.95,103.95,0,1,0,128,232h96a8,8,0,0,0,0-16ZM80,148a20,20,0,1,1,20-20A20,20,0,0,1,80,148Zm48,48a20,20,0,1,1,20-20A20,20,0,0,1,128,196Zm0-96a20,20,0,1,1,20-20A20,20,0,0,1,128,100Zm28,28a20,20,0,1,1,20,20A20,20,0,0,1,156,128Z"></path>
                    </svg>
                </div>
                <h3 class="text-white text-xl font-semibold mb-2">Total Movies</h3>
                <p class="text-[#9caaba] text-3xl font-bold">120</p>
                <a href="{{ route('admin.movies.index') }}" class="mt-4 text-[#0c77f2] text-sm font-medium hover:underline">View All Movies</a>
            </div>

            {{-- Card Upcoming Showtimes --}}
            <div class="bg-[#283039] rounded-xl p-6 shadow-lg flex flex-col items-start">
                <div class="text-white mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"></path>
                    </svg>
                </div>
                <h3 class="text-white text-xl font-semibold mb-2">Upcoming Showtimes</h3>
                <p class="text-[#9caaba] text-3xl font-bold">50</p>
                <a href="{{ route('admin.showtimes.index') }}" class="mt-4 text-[#0c77f2] text-sm font-medium hover:underline">Manage Showtimes</a>
            </div>

            {{-- Card New Bookings Today --}}
            <div class="bg-[#283039] rounded-xl p-6 shadow-lg flex flex-col items-start">
                <div class="text-white mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M227.19,104.48A16,16,0,0,0,240,88.81V64a16,16,0,0,0-16-16H32A16,16,0,0,0,16,64V88.81a16,16,0,0,0,12.81,15.67,24,24,0,0,1,0,47A16,16,0,0,0,16,167.19V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V167.19a16,16,0,0,0-12.81-15.67,24,24,0,0,1,0-47ZM32,167.2a40,40,0,0,0,0-78.39V64H88V192H32Zm192,0V192H104V64H224V88.8a40,40,0,0,0,0,78.39Z"></path>
                    </svg>
                </div>
                <h3 class="text-white text-xl font-semibold mb-2">New Bookings Today</h3>
                <p class="text-[#9caaba] text-3xl font-bold">15</p>
                <a href="{{ route('admin.bookings.index') }}" class="mt-4 text-[#0c77f2] text-sm font-medium hover:underline">View All Bookings</a>
            </div>
        </div>

        {{-- Bagian Daftar Film Terbaru (Contoh Saja) --}}
        <div class="mt-8 bg-[#283039] rounded-xl p-6 shadow-lg">
            <h3 class="text-white text-xl font-semibold mb-4">Latest Movies Added</h3>
            <ul class="divide-y divide-[#111418]">
                <li class="py-3 flex justify-between items-center text-white">
                    <span>The Midnight Hour</span>
                    <span class="text-sm text-[#9caaba]">2024-07-10</span>
                </li>
                <li class="py-3 flex justify-between items-center text-white">
                    <span>Lost in Translation (Re-release)</span>
                    <span class="text-sm text-[#9caaba]">2024-07-05</span>
                </li>
                 <li class="py-3 flex justify-between items-center text-white">
                    <span>Whispers of the Forest</span>
                    <span class="text-sm text-[#9caaba]">2024-06-28</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
