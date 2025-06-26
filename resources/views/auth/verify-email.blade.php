<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cineplex') }} - Verify Email</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="relative flex size-full min-h-screen flex-col bg-[#1a1d21] dark group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            
            {{-- Header dari Mockup --}}
            <header class="flex items-center justify-between whitespace-nowrap px-10 py-3">
                <div class="flex items-center gap-4 text-white">
                    <div class="size-4">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">Cineplex</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-white text-sm font-medium leading-normal" href="#">Now Showing</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">Coming Soon</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">Deals</a>
                        <a class="text-white text-sm font-medium leading-normal" href="#">My Cineplex</a>
                    </div>
                    {{-- ... (bagian profile dropdown bisa ditambahkan di sini jika perlu) ... --}}
                </div>
            </header>

            {{-- Konten Utama --}}
            <div class="flex flex-1 items-center justify-center text-center">
                <div class="w-full max-w-md px-4">
                    <h2 class="text-white text-3xl font-bold leading-tight mb-4">
                        {{ __('Thank you for signing up!') }}
                    </h2>

                    <p class="mb-4 text-base text-gray-400">
                        {{ __('Please verify your email address by clicking the link we\'ve sent to your inbox.') }}
                    </p>

                    {{-- Pesan status jika email verifikasi berhasil dikirim ulang --}}
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-400">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <p class="text-gray-500 text-sm underline mb-6">
                        {{ __("Didn't receive the code? Check your spam folder or resend") }}
                    </p>

                    <div class="mt-4 flex flex-col items-center justify-between gap-4">
                        {{-- Form untuk Resend Verification Email --}}
                        <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 h-12">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>

                        {{-- Form untuk Logout --}}
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 h-12">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>