<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
                Studios
            </h2>
            <a href="{{ route('admin.studios.create') }}" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg text-sm transition-colors">
                Add Studio
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-700/50">
                                <tr>
                                    <th class="px-6 py-3">Studio Name</th>
                                    <th class="px-6 py-3">Capacity</th>
                                    {{-- DIBAIKI: Mengganti nama kolom agar sesuai desain --}}
                                    <th class="px-6 py-3">Seating Template</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($studios as $studio)
                                    <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                                        <td class="px-6 py-4 font-medium">{{ $studio->name }}</td>
                                        <td class="px-6 py-4">{{ $studio->total_seats }} seats</td>
                                        <td class="px-6 py-4">
                                            {{-- DIBAIKI: Tombol untuk melihat denah kursi --}}
                                            <a href="{{ route('admin.studios.seatingTemplate', $studio) }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold transition-colors">
                                                View Template
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.studios.edit', $studio) }}" class="inline-block px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-xs font-semibold transition-colors">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            No studios found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($studios->hasPages())
                        <div class="p-6 border-t border-gray-700">
                            {{ $studios->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
