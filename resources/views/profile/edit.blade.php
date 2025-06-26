<x-app-layout>
    {{-- Header kustom dari mockup-mu --}}
    <x-slot name="header">
        <div class="flex flex-wrap justify-between items-center">
            <h2 class="font-bold text-3xl text-white leading-tight">
                {{ __('Edit Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Form untuk Update Profile Information --}}
            <div class="p-4 sm:p-8 bg-[#121416] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Form untuk Update Password --}}
            <div class="p-4 sm:p-8 bg-[#121416] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Form untuk Logout --}}
            <div class="p-4 sm:p-8 bg-[#121416] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-white">
                        Log Out
                    </h2>
                    <p class="mt-1 text-sm text-gray-400">
                        Securely log out of your account.
                    </p>
                    <form method="POST" action="{{ route('logout') }}" class="mt-6">
                        @csrf
                        <button type="submit" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#2c3035] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                            <span class="truncate">Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Form untuk Delete Account --}}
            <div class="p-4 sm:p-8 bg-[#121416] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>