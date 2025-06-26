<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ isset($studio) ? 'Edit Studio' : 'Add New Studio' }}
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
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form utama untuk Tambah dan Update --}}
                    <form action="{{ isset($studio) ? route('admin.studios.update', $studio) : route('admin.studios.store') }}" method="POST">
                        @csrf
                        @if(isset($studio))
                            @method('PUT')
                        @endif

                        <div class="space-y-6">
                            {{-- Nama Studio --}}
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Studio Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $studio->name ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required>
                            </div>

                            {{-- Total Kursi --}}
                            <div>
                                <label for="total_seats" class="block mb-2 text-sm font-medium text-gray-300">Total Seats</label>
                                <input type="number" name="total_seats" id="total_seats" value="{{ old('total_seats', $studio->total_seats ?? '') }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required>
                            </div>
                        </div>

                        {{-- Tombol Aksi di bagian bawah --}}
                        <div class="mt-8 flex items-center justify-end gap-4">
                            <a href="{{ route('admin.studios.index') }}" class="text-gray-400 hover:text-white transition-colors">Cancel</a>
                            <button type="submit" class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition-colors">
                                {{ isset($studio) ? 'Update Studio' : 'Save Studio' }}
                            </button>
                        </div>
                    </form>

                    {{-- Zona Bahaya: Tombol Delete (hanya muncul saat edit) --}}
                    @if(isset($studio))
                        <div class="mt-8 pt-8 border-t border-gray-700">
                            <h3 class="text-lg font-bold text-red-500">Danger Zone</h3>
                            <p class="text-sm text-gray-400 mt-1">Menghapus studio tidak dapat dibatalkan, terutama jika sudah memiliki jadwal terkait.</p>
                            <form id="delete-form-{{ $studio->id }}" action="{{ route('admin.studios.destroy', $studio) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        onclick="if(confirm('Are you sure you want to delete this studio? This action cannot be undone.')) { document.getElementById('delete-form-{{ $studio->id }}').submit(); }" 
                                        class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg text-sm transition-colors">
                                    Delete This Studio
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
