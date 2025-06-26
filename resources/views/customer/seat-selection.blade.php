{{-- resources/views/customer/seat-selection.blade.php --}}
<x-app-layout>
    <div class="container mx-auto my-10 px-4 max-w-4xl">
        <p class="text-gray-400">Films / {{ $schedule->film->title }} / Select Seats</p>
        <h1 class="text-4xl font-bold mt-2">{{ $schedule->film->title }}</h1>
        <h2 class="text-xl text-gray-300">{{ $schedule->show_time->format('d F Y, H:i') }} - {{ $schedule->studio->name }}</h2>
        <p class="text-gray-300 mt-4">Pilih kursi yang Anda inginkan. Harga per tiket: Rp {{ number_format($schedule->price, 0, ',', '.') }}</p>

        {{-- Menampilkan pesan error jika redirect dari controller --}}
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg my-4">
                {{ session('error') }}
            </div>
        @endif

        <form id="booking.processSeats" action="{{ route('booking.store') }}" method="POST">
            @csrf
            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">

            <div class="my-10 p-6 bg-gray-800 rounded-lg">
                <div class="w-full h-2 bg-white rounded-t-full opacity-50 mb-8"></div>
                <div id="seat-map" class="flex flex-col items-center gap-3">
                    @php
                        // Mengelompokkan kursi berdasarkan barisnya
                        $seatsByRow = $seats->groupBy('seat_row');
                    @endphp
                    @foreach($seatsByRow as $row => $seatsInRow)
                        <div class="flex items-center gap-3">
                            <div class="w-8 text-center text-gray-400">{{ $row }}</div>
                            @foreach($seatsInRow as $seat)
                                @php
                                    $isBooked = in_array($seat->id, $booked_seat_ids);
                                @endphp
                                <div
                                    class="seat w-8 h-8 flex items-center justify-center font-bold text-sm rounded
                                    @if($isBooked)
                                        bg-red-600 cursor-not-allowed
                                    @else
                                        bg-green-500 hover:bg-green-400 cursor-pointer is-available
                                    @endif
                                    "
                                    data-seat-id="{{ $seat->id }}"
                                >
                                    {{ $seat->seat_number }}
                                </div>
                            @endforeach
                            <div class="w-8 text-center text-gray-400">{{ $row }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Input tersembunyi untuk menampung ID kursi yang dipilih --}}
            <div id="selected-seats-container"></div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-xl transition duration-300">
                Lanjut ke Pembayaran
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seatMap = document.getElementById('seat-map');
            const selectedSeatsContainer = document.getElementById('selected-seats-container');
            const bookingForm = document.getElementById('booking-form');

            seatMap.addEventListener('click', (e) => {
                if (!e.target.classList.contains('is-available')) { return; }

                const seat = e.target;
                seat.classList.toggle('selected-seat');

                if (seat.classList.contains('selected-seat')) {
                    seat.classList.remove('bg-green-500');
                    seat.classList.add('bg-blue-500');
                } else {
                    seat.classList.remove('bg-blue-500');
                    seat.classList.add('bg-green-500');
                }
            });

            // Sebelum submit, kumpulkan semua kursi yang dipilih
            bookingForm.addEventListener('submit', function(e) {
                // Hapus input lama agar tidak duplikat
                selectedSeatsContainer.innerHTML = ''; 

                const selected = document.querySelectorAll('.seat.selected-seat');
                if (selected.length === 0) {
                    e.preventDefault(); // Hentikan submit jika tidak ada kursi dipilih
                    alert('Silakan pilih minimal satu kursi.');
                    return;
                }

                selected.forEach(seat => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    // PENTING: Gunakan nama 'seat_ids[]' agar Laravel membacanya sebagai array
                    input.name = 'seat_ids[]'; 
                    input.value = seat.dataset.seatId;
                    selectedSeatsContainer.appendChild(input);
                });
            });
        });
    </script>
</x-app-layout>