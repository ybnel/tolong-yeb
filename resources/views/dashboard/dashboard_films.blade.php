<x-admin-layout>
    {{-- Slot untuk Header Halaman --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
                Manage Movies
            </h2>
            <a href="{{ route('admin.films.create') }}" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg text-sm transition-colors">
                Add Movie
            </a>
        </div>
    </x-slot>

    {{-- Konten Utama Halaman --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Search Form -->
            <form action="{{ route('admin.films.index') }}" method="GET" class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Search movies"
                           value="{{ request('search') }}"
                           class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3">
                </div>
            </form>

            {{-- Menampilkan Notifikasi --}}
            @if(session('success'))
                <div class="bg-green-600 border border-green-700 text-white px-4 py-3 rounded-lg relative mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-600 border border-red-700 text-white px-4 py-3 rounded-lg relative mb-6" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Tabel Data Film --}}
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-700/50">
                                <tr>
                                    {{-- DIBAIKI: Kolom Poster ditambahkan kembali --}}
                                    <th class="px-6 py-3">Poster</th>
                                    <th class="px-6 py-3">Title</th>
                                    <th class="px-6 py-3">Genre</th>
                                    <th class="px-6 py-3">Duration</th>
                                    <th class="px-6 py-3">Release Date</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($films as $film)
                                    <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                                        {{-- DIBAIKI: Sel untuk gambar poster ditambahkan kembali --}}
                                        <td class="px-6 py-4">
                                            <img src="{{ $film->poster_image_url }}"
                                                 alt="Poster {{ $film->title }}"
                                                 class="w-12 h-auto rounded"
                                                 onerror="this.onerror=null;this.src='https://placehold.co/50x75/1f2937/FFFFFF?text=Poster';">
                                        </td>
                                        <td class="px-6 py-4 font-medium">{{ $film->title }}</td>
                                        <td class="px-6 py-4">{{ $film->genre }}</td>
                                        <td class="px-6 py-4">{{ $film->duration_minutes }}m</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($film->release_date)->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.films.edit', $film) }}" class="inline-block px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-xs font-semibold transition-colors">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        {{-- DIBAIKI: Colspan disesuaikan kembali menjadi 6 --}}
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            No movies found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if ($films->hasPages())
                        <div class="p-6 border-t border-gray-700">
                            {{ $films->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
