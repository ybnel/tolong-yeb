<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cineplex') }} - Admin Panel</title>

        <!-- Fonts & Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-200">
        <div class="relative flex min-h-screen bg-[#1e2228]">
            
            @include('layouts.partials.admin-sidebar')

            <div class="flex-1 flex flex-col">
                
                @if (isset($header))
                    <header class="bg-gray-800 shadow-lg">
                        <div class="max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                {{-- DIBAIKI: Warna latar belakang utama ditambahkan di sini --}}
                <main class="flex-grow bg-gray-900">
                    {{-- Konten dari halaman anak akan ditampilkan di dalam <main> ini --}}
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>
