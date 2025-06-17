@extends('layouts.app') {{-- Menggunakan layout dasar aplikasi --}}

@section('content')
    <div class="px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
            <h2 class="text-white tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Welcome back</h2>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf 

                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="email" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">Email</p>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            value=""
                            required
                        />
                    </label>
                </div>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label for="password" class="flex flex-col min-w-40 flex-1">
                        <p class="text-white text-base font-medium leading-normal pb-2">Password</p>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            value=""
                            required
                        />
                    </label>
                </div>
                <p class="text-[#9caaba] text-sm font-normal leading-normal pb-3 pt-1 px-4 underline">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </p>
                <div class="flex px-4 py-3">
                    <button
                        type="submit"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 flex-1 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em]"
                    >
                        <span class="truncate">Login</span>
                    </button>
                </div>
            </form>
            
            <p class="text-[#9caaba] text-sm font-normal leading-normal pb-3 pt-1 px-4 text-center underline">
                <a href="{{ route('register') }}"> Don't have an account? Sign up</a>
            </p>
        </div>
    </div>
@endsection
