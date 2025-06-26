{{-- resources/views/auth/confirm-password.blade.php --}}
<head>
  <title>Confirm Password</title>
</head>
<x-app-layout>
    <div class="px-4 sm:px-10 md:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full sm:w-[512px] py-5 max-w-[960px] flex-1">
            <div class="px-4 text-center">
                <h2 class="text-white tracking-light text-[28px] font-bold leading-tight pb-3 pt-5">Confirm Your Password</h2>
                <p class="mb-4 text-sm text-gray-400">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

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

                <!-- Confirm Button -->
                <div class="flex px-4 py-3 mt-4 max-w-[480px] mx-auto">
                    <button type="submit"
                      class="flex min-w-[84px] w-full cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 flex-1 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-blue-600 transition-colors duration-300"
                    >
                      <span class="truncate">{{ __('Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
