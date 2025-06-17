<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cineplex') }}</title>
    {{-- Memuat Tailwind CSS langsung dari CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style type="text/tailwindcss">
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900" />
</head>
<body>
    <div class="relative flex size-full min-h-screen flex-col bg-[#111418] dark group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#283039] px-10 py-3">
                <div class="flex items-center gap-4 text-white">
                    <div class="size-4">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </div>
                    <h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">Cineplex</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-white text-sm font-medium leading-normal" href="#">Now Showing</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">Coming Soon</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">Locations</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">Gift Cards</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">Promotions</a>
                    </div>
                    
                    {{-- Bagian Otentikasi / Profil --}}
                    <div class="flex items-center gap-3">
                        @guest {{-- Tampilkan ini jika pengguna BELUM login --}}
                            @unless(Request::routeIs('login'))
                                <a href="{{ route('login') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#283039] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                                    <span class="truncate">Sign In</span>
                                </a>
                            @endunless

                            @unless(Request::routeIs('register'))
                                <a href="{{ route('register') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#283039] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                                    <span class="truncate">Sign Up</span>
                                </a>
                            @endunless
                        @endguest

                        @auth {{-- Tampilkan ini jika pengguna SUDAH login --}}
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 text-white text-sm font-bold leading-normal">
                                {{-- Ikon Profil (menggunakan SVG generik) --}}
                                <svg class="w-6 h-6 rounded-full bg-[#9caaba] text-[#111418] flex items-center justify-center" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                                </svg>
                                <span class="truncate">{{ Auth::user()->name }}</span> {{-- Tampilkan nama pengguna --}}
                            </a>
                            
                            {{-- Tombol Logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-red-600 hover:bg-red-700 text-white text-sm font-bold leading-normal tracking-[0.015em]">
                                    <span class="truncate">Logout</span>
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </header>
            
            <main class="flex justify-center items-center flex-grow">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
