{{-- Menggunakan tag komponen yang benar sesuai standar Laravel Breeze/Jetstream --}}
<x-app-layout>
    {{-- Alpine.js untuk fungsionalitas slider dan modal --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Data dan Logika Slider, disesuaikan dengan data film dari proposal --}}
    <script>
        function slider() {
            return {
                currentIndex: 0,
                showModal: false,
                modalData: {},
                // Data film sesuai dengan struktur tabel 'films' pada proposal Anda
                slides: [
                    {
                        genre: 'Sci-Fi, Action',
                        title: 'Godzilla x Kong',
                        poster_image_url: 'https://image.tmdb.org/t/p/w500/v4I53n4u2IazcVLb7CRt1I6zff0.jpg',
                        description: 'Dua raksasa kuno, Godzilla dan Kong, berbenturan dalam pertempuran spektakuler seiring dengan munculnya ancaman kolosal yang tersembunyi di dunia kita, menantang keberadaan mereka dan kelangsungan hidup umat manusia.',
                        duration_minutes: 115
                    },
                    {
                        genre: 'Animation, Adventure',
                        title: 'Kung Fu Panda 4',
                        poster_image_url: 'https://image.tmdb.org/t/p/w500/kDp1vUBnMpe8ak4rjgl3cLELqjU.jpg',
                        description: 'Po, yang akan menjadi Pemimpin Spiritual Lembah Damai, harus mencari dan melatih Prajurit Naga baru, sementara penyihir jahat berencana untuk memanggil kembali semua penjahat utama yang telah dikalahkan Po ke alam roh.',
                        duration_minutes: 94
                    },
                    {
                        genre: 'Action, Thriller',
                        title: 'Civil War',
                        poster_image_url: 'https://image.tmdb.org/t/p/w500/sh7Rg8Er3tFcN9AuqRKysx8qHmD.jpg',
                        description: 'Sebuah perjalanan menegangkan melintasi Amerika yang terpecah di masa depan yang tidak terlalu jauh, mengikuti sekelompok jurnalis militer saat mereka berpacu melawan waktu untuk mencapai DC sebelum faksi pemberontak menyerbu Gedung Putih.',
                        duration_minutes: 109
                    },
                    {
                        genre: 'Horror, Mystery',
                        title: 'The First Omen',
                        poster_image_url: 'https://image.tmdb.org/t/p/w500/hdmPCi2a2o23n5ePABdK2sA7Smt.jpg',
                        description: 'Seorang wanita muda Amerika dikirim ke Roma untuk memulai kehidupan pelayanan bagi gereja. Di sana, ia menemukan kegelapan yang membuatnya mempertanyakan imannya dan mengungkap konspirasi menakutkan yang berharap melahirkan inkarnasi kejahatan.',
                        duration_minutes: 120
                    },
                    {
                        genre: 'Sci-Fi, Adventure',
                        title: 'Dune: Part Two',
                        poster_image_url: 'https://image.tmdb.org/t/p/w500/1Fp4NADGii2Sve2xQ2U23K3sE9.jpg',
                        description: 'Paul Atreides bersatu dengan Chani dan Fremen saat dia membalas dendam pada para konspirator yang menghancurkan keluarganya. Menghadapi pilihan antara cinta dalam hidupnya dan nasib alam semesta, dia harus mencegah masa depan yang mengerikan.',
                        duration_minutes: 166
                    }
                ],
                
                prev() {
                    this.currentIndex = this.currentIndex > 0 ? this.currentIndex - 1 : this.slides.length - 1;
                },
                
                next() {
                    this.currentIndex = this.currentIndex < this.slides.length - 1 ? this.currentIndex + 1 : 0;
                },
                
                openModal(index) {
                    this.modalData = this.slides[index];
                    this.showModal = true;
                },

                cardClass(index) {
                    if (index === this.currentIndex) return 'z-10 scale-105';
                    if (index === this.currentIndex - 1) return '[transform:rotateY(20deg)]';
                    if (index === this.currentIndex + 1) return '[transform:rotateY(-20deg)]';
                    return 'opacity-0 scale-90';
                }
            }
        }
    </script>

    {{-- WRAPPER UTAMA DENGAN STATE ALPINE.JS --}}
    <div x-data="slider()" class="relative h-screen bg-gray-900 text-white font-sans overflow-hidden">
        
        {{-- BACKGROUND IMAGE & OVERLAY GELAP --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?q=80&w=2070" alt="Latar belakang bioskop" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-60"></div>
        </div>

        {{-- GARIS MERAH TIPIS DI ATAS --}}
        <div class="absolute top-0 left-0 right-0 h-1 bg-red-600 z-30"></div>

        {{-- KONTEN UTAMA --}}
        <main class="relative z-10 container mx-auto px-6 lg:px-12 h-full">
            <div class="h-full flex flex-col lg:flex-row items-center justify-center lg:justify-between gap-8 pt-24 pb-12">
                
                {{-- BAGIAN TEKS HERO (KIRI) --}}
                <div class="w-full lg:w-2/5 text-center lg:text-left">
                    <p class="text-sm font-light tracking-wider" x-text="slides[currentIndex].genre"></p>
                    <h1 class="text-5xl sm:text-6xl md:text-8xl font-black my-4 leading-tight uppercase" x-text="slides[currentIndex].title"></h1>
                    <p class="max-w-md text-gray-300 leading-relaxed mx-auto lg:mx-0" x-text="slides[currentIndex].description.substring(0, 150) + '...'"></p>
                    
                    <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                        {{-- DIUBAH: Tombol menjadi "Lihat Jadwal" --}}
                        <button class="flex items-center space-x-2 border border-white px-6 py-3 rounded-full bg-red-600 border-red-600 hover:bg-red-700 transition duration-300" @click="openModal(currentIndex)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-semibold">LIHAT JADWAL</span>
                        </button>
                    </div>
                </div>

                {{-- BAGIAN SLIDER (KANAN) --}}
                <div class="w-full lg:w-3/5">
                    <div class="relative flex items-center justify-center h-96 [perspective:1000px]">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div @click="openModal(index)" 
                                 class="absolute flex-shrink-0 w-64 h-80 rounded-2xl overflow-hidden group cursor-pointer transition-[transform,opacity] duration-500 transform-gpu"
                                 :class="cardClass(index)">
                                <img :src="slide.poster_image_url" class="w-full h-full object-cover" :alt="slide.title">
                                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent text-white">
                                    <p class="text-sm" x-text="slide.genre"></p>
                                    <h3 class="text-xl font-bold uppercase" x-text="slide.title"></h3>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                    {{-- Kontrol Slider --}}
                    <div class="flex items-center justify-end mt-8 mr-12">
                         <div class="flex items-center space-x-4">
                            <button @click="prev()" class="w-10 h-10 border-2 border-gray-500 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition text-xl">&lt;</button>
                            <button @click="next()" class="w-10 h-10 bg-white text-black rounded-full flex items-center justify-center hover:bg-gray-200 transition text-xl">&gt;</button>
                             <div class="w-48 h-1 bg-gray-700 rounded-full">
                                 <div class="h-full bg-red-500 rounded-full transition-all duration-300" :style="`width: ${(currentIndex + 1) / slides.length * 100}%`"></div>
                             </div>
                             <span class="text-2xl font-bold" x-text="currentIndex + 1"></span>
                         </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- MODAL TAMPILAN DETAIL FILM -->
        <div x-show="showModal" @keydown.escape.window="showModal = false"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75" 
             style="display: none;"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
             
            <div @click.away="showModal = false" class="relative bg-gray-800 rounded-lg overflow-hidden shadow-xl max-w-4xl w-full m-4">
                <button @click="showModal = false" class="absolute top-4 right-4 text-white hover:text-red-500 text-3xl z-10">&times;</button>
                <div class="md:flex">
                    <div class="md:w-1/2 flex-shrink-0">
                        <img :src="modalData.poster_image_url" class="w-full h-[600px] object-cover" :alt="modalData.title">
                    </div>
                    <div class="md:w-1/2 p-8 text-white flex flex-col">
                        <div>
                            <p class="text-sm text-gray-400" x-text="modalData.genre"></p>
                            <h2 class="text-4xl font-bold uppercase my-2" x-text="modalData.title"></h2>
                            <p class="text-sm text-gray-400" x-text="`Durasi: ${modalData.duration_minutes} menit`"></p>
                            <p class="mt-4 text-gray-300 leading-relaxed" x-text="modalData.description"></p>
                        </div>
                        <div class="mt-auto pt-4">
                             <a href="#" class="block text-center w-full bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition-colors">Pesan Tiket Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
