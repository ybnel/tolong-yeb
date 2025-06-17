@extends('layouts.admin') {{-- Menggunakan layout admin --}}

@section('content')
<div class="flex-1 p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-white text-3xl font-bold">Manage Users</h1>
        {{-- Tombol Add User jika diperlukan --}}
        <a href="#" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#0c77f2] text-white text-sm font-bold leading-normal tracking-[0.015em]">
            <span class="truncate">Add User</span>
        </a>
    </div>

    <div class="mb-6">
        <label for="search-users" class="sr-only">Search users</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-[#9caaba]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input
                type="text"
                id="search-users"
                placeholder="Search users"
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 pl-10 text-base font-normal leading-normal"
            />
        </div>
    </div>

    <div class="bg-[#283039] rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-[#111418]">
            <thead class="bg-[#111418]">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#9caaba] uppercase tracking-wider">Role</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-[#9caaba] uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#111418]">
                {{-- Contoh data pengguna --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">john.doe@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Customer</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-4">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-800">Remove</a>
                    </td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Jane Smith</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">jane.smith@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">Admin</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#0c77f2] hover:text-[#0a63d4] mr-4">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-800">Remove</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
