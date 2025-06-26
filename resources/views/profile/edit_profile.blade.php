{{-- resources/views/profile/edit_profile.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-white leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Form untuk Update Profile Information --}}
            <div class="p-4 sm:p-8 bg-[#1a1d21] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Form untuk Update Password --}}
            <div class="p-4 sm:p-8 bg-[#1a1d21] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Form untuk Delete Account --}}
            <div class="p-4 sm:p-8 bg-[#1a1d21] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>