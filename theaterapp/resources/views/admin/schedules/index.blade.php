@extends('layouts.admin')

@section('content')
<div class="flex-1 p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-white text-3xl font-bold">Schedules</h1>
        <a href="{{ route('admin.showtimes.create') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#0c77f2] text-white text-sm font-bold leading-normal tracking-[0.015em]">
            <span class="truncate">New Schedule</span>
        </a>
    </div>

    <div class="mb-6">
        <label for="search-schedules" class="sr-only">Search schedules</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                {{-- Search Icon --}}
                <svg class="w-5 h-5 text-[#9caaba]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input
                type="text"
                id="search-schedules"
                placeholder="Search schedules"
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 pl-10 text-base font-normal leading-normal"
            />
        </div>
    </div>

    <div class="bg-[#283039] rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-[#111418]">
            <thead class="bg-[#111418]">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Movie</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Theater</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Showtime</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-[#9caaba] uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#111418]">
                {{-- Loop melalui data jadwal di sini --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">The Midnight Hour</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Grand Cinema 1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">7:00 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">2024-07-20</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4]">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">The Midnight Hour</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Grand Cinema 2</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">9:30 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">2024-07-20</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4]">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">The Lost City</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Metroplex 3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">6:00 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">2024-07-21</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4]">Edit</a>
                    </td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">The Lost City</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Metroplex 4</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">8:30 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">2024-07-21</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4]">Edit</a>
                    </td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">The Starlight Symphony</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Regal 5</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">5:30 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">2024-07-22</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4]">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
