@extends('layouts.app')

@section('content')
    <div class="px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-[768px] max-w-[960px] py-5 flex-1">
            <h2 class="text-white tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">My Profile</h2>

            {{-- Memanggil partial untuk Update Profile Information --}}
            <div class="bg-[#1e2329] rounded-xl p-6 mb-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Memanggil partial untuk Update Password --}}
            <div class="bg-[#1e2329] rounded-xl p-6 mb-8">
                @include('profile.partials.update-password-form')
            </div>

            {{-- Memanggil partial untuk Delete Account --}}
            <div class="bg-[#1e2329] rounded-xl p-6">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection