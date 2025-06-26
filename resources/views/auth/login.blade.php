<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cineplex') }} - Login</title>

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
            <a href="{{ route('register') }}"
              class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#283039] text-white text-sm font-bold leading-normal tracking-[0.015em]"
            >
              <span class="truncate">Sign Up</span>
            </a>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
            <h2 class="text-white tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Welcome back</h2>
            
            <!-- Session Status (untuk pesan sukses seperti password reset) -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                  <label for="email" class="flex flex-col min-w-40 flex-1">
                    <p class="text-white text-base font-medium leading-normal pb-2">Email</p>
                    <input
                      id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                      placeholder="Enter your email"
                      class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </label>
                </div>

                <!-- Password -->
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                  <label for="password" class="flex flex-col min-w-40 flex-1">
                    <p class="text-white text-base font-medium leading-normal pb-2">Password</p>
                    <input
                      id="password" type="password" name="password" required autocomplete="current-password"
                      placeholder="Enter your password"
                      class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </label>
                </div>

                <!-- Forgot Password Link -->
                <div class="flex items-center justify-end mt-4 px-4">
                    <a class="underline text-sm text-[#9caaba] hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>

                <!-- Login Button -->
                <div class="flex px-4 py-3 mt-4">
                  <button type="submit"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 flex-1 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em]"
                  >
                    <span class="truncate">{{ __('Log in') }}</span>
                  </button>
                </div>

                <!-- Sign Up Link -->
                <p class="text-[#9caaba] text-sm font-normal leading-normal pb-3 pt-1 px-4 text-center">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="underline hover:text-white">Sign up</a>
                </p>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>