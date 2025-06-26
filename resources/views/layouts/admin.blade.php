<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cineplex') }} - Admin</title>

        <!-- Fonts & Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        {{-- DIBAIKI: Wrapper utama dibuat sama seperti app.blade.php --}}
        <div class="relative flex size-full min-h-screen flex-col bg-[#1e2228] dark group/design-root overflow-x-hidden">
            
            {{-- Bagian ini berbeda: admin tidak memiliki top navigation seperti app.blade.php --}}
            {{-- Sebagai gantinya, kita akan langsung membuat layout dengan sidebar --}}
            <div class="flex h-full grow">
                
                {{-- Include Sidebar Navigasi Admin --}}
                @include('layouts.partials.admin-sidebar')

                {{-- Kontainer Konten Utama --}}
                <div class="flex-1 flex flex-col">
                    
                    <!-- Page Heading (Header) -->
                    @if (isset($header))
                        <header class="bg-gray-800 shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content -->
                    <main class="flex-grow">
                        {{-- Konten dari halaman anak akan ditampilkan di sini --}}
                        {{ $slot }}
                    </main>
                </div>

            </div>
        </div>
    </body>
</html>
