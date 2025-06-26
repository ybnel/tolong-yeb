<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{-- Judul akan berubah secara dinamis --}}
            {{ isset($film) ? __('Edit Movie') : __('Add New Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-100">
                    
                    {{-- Menampilkan error validasi jika ada --}}
                    @if ($errors->any())
                        <div class="bg-red-600 border border-red-700 text-white px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form utama HANYA untuk Tambah dan Update --}}
                    <form action="{{ isset($film) ? route('admin.films.update', $film) : route('admin.films.store') }}" method="POST">
                        @csrf
                        {{-- Method spoofing untuk mode edit --}}
                        @if(isset($film))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Judul Film --}}
                            <div class="md:col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $film->title ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>

                            {{-- Genre --}}
                            <div>
                                <label for="genre" class="block mb-2 text-sm font-medium text-gray-300">Genre</label>
                                <input type="text" name="genre" id="genre" value="{{ old('genre', $film->genre ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>

                            {{-- Durasi --}}
                            <div>
                                <label for="duration_minutes" class="block mb-2 text-sm font-medium text-gray-300">Duration (minutes)</label>
                                <input type="number" name="duration_minutes" id="duration_minutes" value="{{ old('duration_minutes', $film->duration_minutes ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>

                            {{-- Tanggal Rilis --}}
                            <div>
                                <label for="release_date" class="block mb-2 text-sm font-medium text-gray-300">Release Date</label>
                                <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $film->release_date ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>

                            {{-- URL Poster --}}
                            <div>
                                <label for="poster_image_url" class="block mb-2 text-sm font-medium text-gray-300">Poster URL</label>
                                <input type="url" name="poster_image_url" id="poster_image_url" value="{{ old('poster_image_url', $film->poster_image_url ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            {{-- Deskripsi --}}
                            <div class="md:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="4" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ old('description', $film->description ?? '') }}</textarea>
                            </div>
                        </div>

                        {{-- Tombol aksi untuk Simpan dan Batal --}}
                        <div class="mt-8 flex items-center justify-end gap-4">
                            <a href="{{ route('admin.films.index') }}" class="text-gray-400 hover:text-white">Cancel</a>
                            <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition-colors">
                                {{ isset($film) ? 'Update Movie' : 'Save Movie' }}
                            </button>
                        </div>
                    </form>

                    {{-- Form terpisah untuk Delete, HANYA MUNCUL saat mode edit --}}
                    @if(isset($film))
                        <div class="mt-8 pt-8 border-t border-gray-700">
                            <h3 class="text-lg font-bold text-red-500">Danger Zone</h3>
                            <p class="text-sm text-gray-400 mt-1">Menghapus film tidak dapat dibatalkan. Pastikan Anda benar-benar yakin.</p>
                            <form id="delete-form-{{ $film->id }}" action="{{ route('admin.films.destroy', $film) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        onclick="if(confirm('Are you sure you want to delete this movie permanently?')) { document.getElementById('delete-form-{{ $film->id }}').submit(); }" 
                                        class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg text-sm transition-colors">
                                    Delete This Movie
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
