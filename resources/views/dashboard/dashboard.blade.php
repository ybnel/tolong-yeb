<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Statistik Ringkasan --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Total Film --}}
                <x-admin.stat-card icon="film" label="Total Film" value="{{ \App\Models\Film::count() }}" color="blue" />

                {{-- Total Booking --}}
                <x-admin.stat-card icon="ticket" label="Total Booking" value="{{ \App\Models\Booking::count() }}" color="green" />

                {{-- Total Pengguna --}}
                <x-admin.stat-card icon="user-group" label="Total Pengguna" value="{{ \App\Models\User::count() }}" color="yellow" />

                {{-- Total Pendapatan --}}
                <x-admin.stat-card 
                    icon="currency-dollar" 
                    label="Total Pendapatan" 
                    value="Rp {{ number_format(\App\Models\Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_price'), 0, ',', '.') }}" 
                    color="indigo" 
                />
            </div>

            {{-- Sambutan --}}
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    Selamat datang di Panel Admin Aplikasi Pemesanan Tiket Bioskop. Anda dapat mengelola data film, studio, kursi, jadwal tayang, pengguna, serta memantau laporan penjualan dan aktivitas pemesanan dari halaman ini.
                </div>
            </div>

            {{-- Placeholder Grafik Penjualan (Opsional) --}}
            <div class="bg-gray-800 border border-gray-700 sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Grafik Penjualan Tiket Minggu Ini</h3>
                {{-- Gantikan dengan chart nyata menggunakan Chart.js atau ApexCharts --}}
                <div class="h-48 bg-gray-700 rounded flex items-center justify-center text-gray-400">
                    [Grafik Placeholder]
                </div>
            </div>

            {{-- Tabel Booking Terbaru --}}
            <div class="bg-gray-800 border border-gray-700 sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Pemesanan Terbaru</h3>
                <table class="min-w-full text-left text-sm text-gray-300">
                    <thead class="bg-gray-700 text-gray-100">
                        <tr>
                            <th class="px-4 py-2">Kode Booking</th>
                            <th class="px-4 py-2">Customer</th>
                            <th class="px-4 py-2">Film</th>
                            <th class="px-4 py-2">Waktu Tayang</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach (\App\Models\Booking::latest()->take(5)->get() as $booking)
                            <tr>
                                <td class="px-4 py-2">{{ $booking->booking_code }}</td>
                                <td class="px-4 py-2">{{ $booking->user->name }}</td>
                                <td class="px-4 py-2">{{ $booking->schedule->film->title }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($booking->schedule->show_time)->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded bg-gray-700 text-xs">{{ ucfirst($booking->status) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
