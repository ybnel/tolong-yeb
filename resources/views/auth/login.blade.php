{{-- resources/views/auth/login.blade.php --}}
<head>
  <title>Login</title>
</head>
<x-app-layout>
    <div class="px-4 sm:px-10 md:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full sm:w-[512px] py-5 max-w-[960px] flex-1">
          <h2 class="text-white tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Welcome back</h2>
          
          {{-- Session Status (for messages like password reset success) --}}
          <x-auth-session-status class="mb-4" :status="session('status')" />
    
          <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email Address -->
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3 mx-auto">
                <label for="email" class="flex flex-col min-w-40 flex-1">
                  <p class="text-white text-base font-medium leading-normal pb-2">Email</p>
                  <input
                    id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="Enter your email"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-14 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                  />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </label>
              </div>

              <!-- Password -->
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3 mx-auto">
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
              <div class="flex items-center justify-start mt-4 px-4 max-w-[480px] mx-auto">
                  <a class="underline text-sm text-[#9caaba] hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              </div>

              <!-- Login Button -->
              <div class="flex px-4 py-3 mt-4 max-w-[480px] mx-auto">
                <button type="submit"
                  class="flex min-w-[84px] w-full cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 flex-1 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-blue-600 transition-colors duration-300"
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
</x-app-layout>
