<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ isset($schedule) ? 'Edit Jadwal' : 'Tambah Jadwal Baru' }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-100">
                    
                    @if ($errors->any())
                        <div class="bg-red-600 p-4 rounded-lg mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form utama untuk Tambah dan Update --}}
                    <form action="{{ isset($schedule) ? route('admin.schedules.update', $schedule) : route('admin.schedules.store') }}" method="POST">
                        @csrf
                        @if(isset($schedule))
                            @method('PUT')
                        @endif

                        <div class="space-y-6">
                            {{-- Dropdown Film --}}
                            <div>
                                <label for="film_id" class="block mb-2 text-sm font-medium">Film</label>
                                <select name="film_id" id="film_id" class="bg-gray-700 border border-gray-600 text-white w-full rounded-lg" required>
                                    <option value="">-- Pilih Film --</option>
                                    @foreach($films as $film)
                                        <option value="{{ $film->id }}" @selected(old('film_id', $schedule->film_id ?? '') == $film->id)>
                                            {{ $film->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Dropdown Studio --}}
                            <div>
                                <label for="studio_id" class="block mb-2 text-sm font-medium">Studio</label>
                                <select name="studio_id" id="studio_id" class="bg-gray-700 border border-gray-600 text-white w-full rounded-lg" required>
                                    <option value="">-- Pilih Studio --</option>
                                    @foreach($studios as $studio)
                                        <option value="{{ $studio->id }}" @selected(old('studio_id', $schedule->studio_id ?? '') == $studio->id)>
                                            {{ $studio->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Waktu Tayang --}}
                            <div>
                                <label for="show_time" class="block mb-2 text-sm font-medium">Waktu Tayang</label>
                                <input type="datetime-local" name="show_time" id="show_time" value="{{ old('show_time', isset($schedule) ? \Carbon\Carbon::parse($schedule->show_time)->format('Y-m-d\TH:i') : '') }}" class="bg-gray-700 border border-gray-600 text-white w-full rounded-lg" required>
                            </div>

                            {{-- Harga --}}
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium">Harga Tiket</label>
                                <input type="number" name="price" id="price" value="{{ old('price', $schedule->price ?? '') }}" placeholder="Contoh: 50000" class="bg-gray-700 border border-gray-600 text-white w-full rounded-lg" required>
                            </div>
                        </div>

                        {{-- Tombol Aksi di bagian bawah --}}
                        <div class="mt-8 flex items-center justify-between">
                            {{-- Tombol Delete HANYA MUNCUL saat mode edit --}}
                            <div>
                                @if(isset($schedule))
                                    <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>

                            {{-- Tombol Batal dan Simpan/Update --}}
                            <div class="flex items-center gap-4">
                                <a href="{{ route('admin.schedules.index') }}" class="text-gray-400 hover:text-white">Batal</a>
                                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition-colors">
                                    {{ isset($schedule) ? 'Perbarui Jadwal' : 'Simpan Jadwal' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
