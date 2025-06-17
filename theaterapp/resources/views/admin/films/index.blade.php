@extends('layouts.admin') {{-- Memanggil layout admin yang sudah kita definisikan --}}

@section('content')
    <div class="flex flex-wrap justify-between gap-3 p-4">
        <p class="text-white tracking-light text-[32px] font-bold leading-tight min-w-72">Manage Movies</p>
        <a href="{{ route('admin.movies.create') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#0c77f2] text-white text-sm font-medium leading-normal">
            <span class="truncate">Add Movie</span>
        </a>
    </div>
    <div class="px-4 py-3">
        <label class="flex flex-col min-w-40 h-12 w-full">
            <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                <div
                    class="text-[#9caaba] flex border-none bg-[#283039] items-center justify-center pl-4 rounded-l-xl border-r-0"
                    data-icon="MagnifyingGlass"
                    data-size="24px"
                    data-weight="regular"
                >
                    {{-- Search Icon SVG --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                </div>
                <input
                    type="text" {{-- Menambahkan type="text" --}}
                    id="search-movies" {{-- Menambahkan ID untuk label --}}
                    placeholder="Search movies"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-full placeholder:text-[#9caaba] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                    value=""
                />
            </div>
        </label>
    </div>
    <div class="px-4 py-3 @container">
        <div class="flex overflow-hidden rounded-xl border border-[#3b4754] bg-[#111418]">
            <table class="flex-1">
                <thead>
                    <tr class="bg-[#1b2127]">
                        {{-- Menggunakan class yang lebih generik 'table-column-WIDTH' --}}
                        <th class="table-column-120 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Title</th>
                        <th class="table-column-240 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Genre</th>
                        <th class="table-column-360 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Duration</th>
                        <th class="table-column-480 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">
                            Release Date
                        </th>
                        <th class="table-column-600 px-4 py-3 text-left text-white w-60 text-[#9caaba] text-sm font-medium leading-normal">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-t-[#3b4754]">
                        <td class="table-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                            The Crimson Tide
                        </td>
                        <td class="table-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Action</td>
                        <td class="table-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">2h 15m</td>
                        <td class="table-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                            2023-11-15
                        </td>
                        <td class="table-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                            <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-2">Edit</a> | <a href="#" class="text-red-600 hover:text-red-800 ml-2">Remove</a>
                        </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                        <td class="table-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                            Whispers of the Past
                        </td>
                        <td class="table-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Drama</td>
                        <td class="table-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">1h 45m</td>
                        <td class="table-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                            2023-10-20
                        </td>
                        <td class="table-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                            <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-2">Edit</a> | <a href="#" class="text-red-600 hover:text-red-800 ml-2">Remove</a>
                        </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                        <td class="table-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                            Starlight Symphony
                        </td>
                        <td class="table-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Romance</td>
                        <td class="table-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">1h 30m</td>
                        <td class="table-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                            2023-09-05
                        </td>
                        <td class="table-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                            <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-2">Edit</a> | <a href="#" class="text-red-600 hover:text-red-800 ml-2">Remove</a>
                        </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                        <td class="table-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                            Echoes of Tomorrow
                        </td>
                        <td class="table-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Sci-Fi</td>
                        <td class="table-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">2h 00m</td>
                        <td class="table-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                            2023-08-12
                        </td>
                        <td class="table-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                            <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-2">Edit</a> | <a href="#" class="text-red-600 hover:text-red-800 ml-2">Remove</a>
                        </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                        <td class="table-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                            The Silent Witness
                        </td>
                        <td class="table-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Thriller</td>
                        <td class="table-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">1h 50m</td>
                        <td class="table-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                            2023-07-28
                        </td>
                        <td class="table-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                            <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-2">Edit</a> | <a href="#" class="text-red-600 hover:text-red-800 ml-2">Remove</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection