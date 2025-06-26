<x-app-layout>
    <div class="container mx-auto my-10 px-4">
        <h1 class="text-3xl font-bold text-white mb-6">Riwayat Booking Anda</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-6">
            @forelse ($bookings as $booking)
                <div class="bg-gray-800 rounded-lg p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold text-white">{{ $booking->schedule->film->title }}</h2>
                            <p class="text-sm text-gray-400">{{ $booking->schedule->show_time->format('l, d F Y - H:i') }}</p>
                            <p class="text-sm text-gray-400">{{ $booking->schedule->studio->name }}</p>
                            <p class="mt-2 text-xs text-gray-500">Kode Booking: {{ $booking->booking_code }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-white">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                @if($booking->status == 'confirmed') bg-green-200 text-green-800 @endif
                                @if($booking->status == 'cancelled') bg-red-200 text-red-800 @endif
                            ">{{ ucfirst($booking->status) }}</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-700 mt-4 pt-4">
                        <h3 class="text-md font-semibold text-white">Kursi yang Dipesan:</h3>
                        <p class="text-gray-300">
                            @foreach ($booking->seats as $seat)
                                <span class="inline-block bg-blue-600 px-2 py-1 rounded text-sm m-1">{{ $seat->seat_row }}{{ $seat->seat_number }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400">Anda belum memiliki riwayat booking.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>