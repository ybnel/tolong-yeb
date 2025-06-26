<x-app-layout>
    {{-- Alpine.js untuk fungsionalitas interaktif --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Script untuk logika halaman booking --}}
    <script>
        function booking() {
            return {
                // DATA STATIS (Nantinya bisa diisi dari Controller Laravel)
                movieDetails: {
                    title: 'F1 THE MOVIE',
                    studio: 'IMAX',
                    location: 'PAKUWON MALL, Studio 1, IMAX 2D',
                    date: 'Rabu, 25 Juni 2025',
                    time: '21:15',
                    poster_url: 'https://image.tmdb.org/t/p/w500/sh7Rg8Er3tFcN9AuqRKysx8qHmD.jpg' // Contoh poster Civil War
                },
                pricePerSeat: 50000,
                seatLayout: {
                    rows: ['N', 'M', 'L', 'K', 'J', 'H', 'G', 'F', 'E', 'D', 'C', 'B', 'A'],
                    seatsPerRow: 16,
                    gapAfter: 8, // Memberi jarak setelah kursi ke-8
                },
                // Kursi yang sudah terisi (datanya akan datang dari database)
                bookedSeats: ['N12', 'N13', 'L10', 'L11', 'G14', 'G15', 'A10', 'A11'],

                // STATE DINAMIS (Dikelola oleh Alpine.js)
                selectedSeats: [],

                // METHODS (Fungsi-fungsi)
                toggleSeat(seatId) {
                    // Jangan lakukan apa-apa jika kursi sudah dibooking
                    if (this.bookedSeats.includes(seatId)) {
                        return;
                    }
                    // Jika kursi sudah dipilih, batalkan pilihan
                    if (this.selectedSeats.includes(seatId)) {
                        this.selectedSeats = this.selectedSeats.filter(s => s !== seatId);
                    } else {
                        // Jika belum dipilih, tambahkan ke pilihan
                        this.selectedSeats.push(seatId);
                    }
                },

                getSeatStatus(seatId) {
                    if (this.bookedSeats.includes(seatId)) {
                        return 'booked'; // Status: sudah terisi
                    }
                    if (this.selectedSeats.includes(seatId)) {
                        return 'selected'; // Status: sedang dipilih user
                    }
                    return 'available'; // Status: tersedia
                },
                
                clearSelection() {
                    this.selectedSeats = [];
                },

                // COMPUTED PROPERTIES (Data yang dihitung otomatis)
                get totalPrice() {
                    return this.selectedSeats.length * this.pricePerSeat;
                },

                get selectedSeatsDisplay() {
                    if (this.selectedSeats.length === 0) {
                        return 'Kamu belum pilih kursi';
                    }
                    // Urutkan kursi agar rapi (misal: A1, A2, B5)
                    return this.selectedSeats.sort((a, b) => {
                        const rowA = a.charAt(0);
                        const numA = parseInt(a.substring(1));
                        const rowB = b.charAt(0);
                        const numB = parseInt(b.substring(1));
                        if (rowA < rowB) return 1;
                        if (rowA > rowB) return -1;
                        return numA - numB;
                    }).join(', ');
                }
            }
        }
    </script>
    
    {{-- Tampilan Halaman Booking --}}
    <div class="bg-gray-900 text-white min-h-screen" x-data="booking()">
        <div class="container mx-auto p-4 md:p-8">
            {{-- Tombol Kembali --}}
            <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-gray-300 hover:text-white mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                <span>Pilih kursi kamu</span>
            </a>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Kolom Kiri: Denah Kursi -->
                <div class="w-full lg:w-2/3 bg-gray-800 p-6 rounded-lg">
                    {{-- Area Layar --}}
                    <div class="mb-8">
                        <div class="h-4 bg-white rounded-t-full shadow-[0_0_25px_0_rgba(255,255,255,0.5)]"></div>
                        <p class="text-center text-gray-400 mt-2">Area Layar</p>
                    </div>

                    {{-- Denah Kursi --}}
                    <div class="flex flex-col items-center gap-2">
                        <template x-for="row in seatLayout.rows" :key="row">
                            <div class="flex items-center gap-2">
                                <span class="w-6 text-center text-gray-400" x-text="row"></span>
                                <div class="flex gap-2">
                                    <template x-for="seatNum in seatLayout.seatsPerRow" :key="seatNum">
                                        <button 
                                            @click="toggleSeat(`${row}${seatNum}`)"
                                            :class="{
                                                'bg-red-500 text-white': getSeatStatus(`${row}${seatNum}`) === 'booked',
                                                'bg-green-500 text-white': getSeatStatus(`${row}${seatNum}`) === 'selected',
                                                'bg-gray-600 hover:bg-gray-500 text-gray-300': getSeatStatus(`${row}${seatNum}`) === 'available',
                                                'mr-4': seatNum === seatLayout.gapAfter
                                            }"
                                            class="w-8 h-8 rounded text-xs font-bold transition-colors duration-200"
                                            :disabled="getSeatStatus(`${row}${seatNum}`) === 'booked'">
                                            <span x-text="`${row}${seatNum}`"></span>
                                        </button>
                                    </template>
                                </div>
                                <span class="w-6 text-center text-gray-400" x-text="row"></span>
                            </div>
                        </template>
                    </div>

                    {{-- Legenda --}}
                    <div class="mt-8 flex justify-center gap-6 text-sm">
                        <div class="flex items-center gap-2"><div class="w-4 h-4 rounded bg-gray-600"></div><span>Tersedia</span></div>
                        <div class="flex items-center gap-2"><div class="w-4 h-4 rounded bg-green-500"></div><span>Pilihanmu</span></div>
                        <div class="flex items-center gap-2"><div class="w-4 h-4 rounded bg-red-500"></div><span>Terisi</span></div>
                    </div>
                </div>

                <!-- Kolom Kanan: Detail Pemesanan -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <div class="flex gap-4">
                            <img :src="movieDetails.poster_url" :alt="movieDetails.title" class="w-24 h-36 object-cover rounded">
                            <div>
                                <h2 class="text-xl font-bold" x-text="movieDetails.title"></h2>
                                <p class="text-sm text-gray-400" x-text="movieDetails.studio"></p>
                                <p class="text-sm text-gray-400" x-text="movieDetails.location"></p>
                                <p class="text-sm text-gray-400 mt-2" x-text="movieDetails.date"></p>
                            </div>
                        </div>

                        <hr class="border-gray-700 my-4">

                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Waktu Tayang</span>
                            <span class="font-bold text-lg" x-text="movieDetails.time"></span>
                        </div>

                        <hr class="border-gray-700 my-4">

                        <div>
                            <p class="text-gray-400 mb-2">Nomor Kursi</p>
                            <p class="font-bold text-lg min-h-[28px]" x-text="selectedSeatsDisplay"></p>
                        </div>
                        
                        <div class="mt-4">
                            <p class="text-gray-400 mb-2">Total Harga</p>
                            <p class="font-bold text-2xl" x-text="new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(totalPrice)"></p>
                        </div>

                        <hr class="border-gray-700 my-6">

                        <div class="flex flex-col gap-4">
                            <button @click="clearSelection()" 
                                    class="w-full py-3 px-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors"
                                    :disabled="selectedSeats.length === 0"
                                    :class="{'opacity-50 cursor-not-allowed': selectedSeats.length === 0}">
                                Hapus Pilihan
                            </button>
                            <button class="w-full py-3 px-4 bg-red-600 rounded-lg hover:bg-red-700 transition-colors"
                                    :disabled="selectedSeats.length === 0"
                                    :class="{'opacity-50 cursor-not-allowed': selectedSeats.length === 0}">
                                Lanjut ke Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
