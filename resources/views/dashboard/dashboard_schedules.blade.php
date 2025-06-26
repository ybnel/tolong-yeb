<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
                {{ __('Schedules') }}
            </h2>
            <a href="{{ route('admin.schedules.create') }}" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white font-bold rounded-lg transition-colors">
                New Schedule
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Search Form -->
            <form action="{{ route('admin.schedules.index') }}" method="GET" class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Search by movie or theater"
                           value="{{ request('search') }}"
                           class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
                </div>
            </form>

            @if(session('success'))
                <div class="bg-green-600 border border-green-700 text-white px-4 py-3 rounded-lg relative mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-700/50">
                                <tr>
                                    <th class="px-6 py-3">Movie</th>
                                    <th class="px-6 py-3">Theater</th>
                                    <th class="px-6 py-3">Showtime</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules as $schedule)
                                    <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                                        <td class="px-6 py-4 font-medium">{{ $schedule->film->title }}</td>
                                        <td class="px-6 py-4">{{ $schedule->studio->name }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($schedule->show_time)->format('h:i A') }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($schedule->show_time)->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4">
                                            @if (\Carbon\Carbon::parse($schedule->show_time)->isFuture())
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-100 bg-green-700 rounded-full">Active</span>
                                            @else
                                                <span class="px-2 py-1 font-semibold leading-tight text-gray-100 bg-gray-600 rounded-full">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.schedules.edit', $schedule) }}" class="inline-block px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-xs font-semibold transition-colors">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            No schedules found for your search.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if ($schedules->hasPages())
                        <div class="p-6 border-t border-gray-700">
                            {{-- Menambahkan appends() agar filter tetap ada saat paginasi --}}
                            {{ $schedules->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
