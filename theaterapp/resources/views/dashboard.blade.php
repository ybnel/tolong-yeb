@extends('layouts.app') {{-- Menggunakan layout aplikasi umum --}}

@section('content')
    <div class="flex flex-col items-center justify-center py-10 px-4">
        <h1 class="text-white text-4xl font-bold leading-tight tracking-[-0.015em] mb-4">
            Selamat Datang, {{ Auth::user()->name }}!
        </h1>
        <p class="text-[#9caaba] text-lg text-center">
            Anda telah berhasil masuk sebagai pengguna biasa. Nikmati penjelajahan film kami.
        </p>
        <div class="mt-8">
            <a href="{{ route('home') }}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#0c77f2] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Lihat Film Sekarang</span>
            </a>
        </div>
    </div>
@endsection
