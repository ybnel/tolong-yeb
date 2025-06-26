<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
                Seating Template: <span class="text-blue-500">{{ $studio->name }}</span>
            </h2>
            
            <div class="flex items-center gap-4">
                <form action="{{ route('admin.studios.seatingTemplate.regenerate', $studio) }}" method="POST" onsubmit="return confirm('Yakin ingin membuat ulang denah kursi?');">
                    @csrf
                    <button type="submit" class="px-5 py-2.5 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg text-sm transition-colors">
                        Regenerate Template
                    </button>
                </form>
                <a href="{{ route('admin.studios.index') }}" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg text-sm">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-600 text-white p-4 rounded-lg mb-6">{{ session('success') }}</div>
            @endif

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-100 flex flex-col items-center">
                    
                    <div class="mb-12 w-full max-w-5xl">
                        <div class="h-6 bg-gradient-to-b from-white to-gray-400 rounded-t-full shadow-[0_0_35px_0_rgba(255,255,255,0.4)]"></div>
                        <p class="text-center text-gray-400 mt-2 tracking-widest uppercase">Area Layar</p>
                    </div>

                    <div class="flex flex-col items-center gap-3">
                        @php
                            // Mengurutkan baris secara terbalik (Z ke A) untuk tampilan
                            $sortedRows = $seatLayout->keys()->sortDesc();
                            $maxSeatsPerRow = 20; // Grid maksimal 20 kursi
                            $aisleAfterSeat = 10; // Lorong setelah kursi ke-10
                        @endphp

                        @foreach ($sortedRows as $row)
                            {{-- Menambahkan jarak vertikal untuk lorong tangga setelah baris D --}}
                            <div class="flex items-center gap-2 {{ $row == 'D' ? 'mb-8' : '' }}">
                                @for ($seatNum = 1; $seatNum <= $maxSeatsPerRow; $seatNum++)
                                    {{-- Menambahkan lorong tengah --}}
                                    @if($seatNum == $aisleAfterSeat + 1)
                                        <div class="w-16"></div>
                                    @endif

                                    @php
                                        // Cari apakah kursi ini benar-benar ada di database
                                        $seat = $seatLayout->get($row)->firstWhere('seat_number', $seatNum);
                                    @endphp

                                    @if ($seat)
                                        {{-- Jika kursi ada, tampilkan --}}
                                        <div class="w-10 h-8 rounded bg-gray-600 flex items-center justify-center text-xs font-bold text-white">
                                            <span>{{ $seat->seat_row . $seat->seat_number }}</span>
                                        </div>
                                    @else
                                        {{-- Jika tidak ada (area pintu masuk), tampilkan ruang kosong --}}
                                        <div class="w-10 h-8"></div>
                                    @endif
                                @endfor
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
