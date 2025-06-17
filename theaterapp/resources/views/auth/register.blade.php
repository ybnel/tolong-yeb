@extends('layouts.app') {{-- Menggunakan layout dasar aplikasi --}}

@section('content')
    <div class="px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
            <h2 class="text-white tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Create an Account</h2>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf

                {{-- Bagian First Name --}}
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="first_name" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">First Name</p>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            placeholder="Enter your first name"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('first_name') border-red-500 @enderror"
                            value="{{ old('first_name') }}" {{-- Pertahankan nilai lama --}}
                            required
                        />
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                {{-- Bagian Last Name --}}
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="last_name" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">Last Name</p>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            placeholder="Enter your last name"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('last_name') border-red-500 @enderror"
                            value="{{ old('last_name') }}" {{-- Pertahankan nilai lama --}}
                            required
                        />
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                {{-- Bagian Email --}}
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="email" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">Email</p>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" {{-- Pertahankan nilai lama --}}
                            required
                        />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                {{-- Bagian Password --}}
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="password" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">Password</p>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('password') border-red-500 @enderror"
                            required
                        />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                {{-- Bagian Confirm Password --}}
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="password_confirmation" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">Confirm Password</p>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Confirm your password"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            required
                        />
                    </label>
                </div>
                
                {{-- Tombol Create Account --}}
                <div class="flex px-4 py-3">
                    <button
                        type="submit"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 flex-1 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em]"
                    >
                        <span class="truncate">Create Account</span>
                    </button>
                </div>
            </form>
            
            <p class="text-[#9caaba] text-sm font-normal leading-normal pb-3 pt-1 px-4 text-center underline">
                <a href="{{ route('login') }}"> Already have an account? Sign In</a>
            </p>
        </div>
    </div>
@endsection