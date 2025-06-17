@extends('layouts.app') {{-- Menggunakan layout umum aplikasi --}}

@section('content')
    <div class="px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-[768px] max-w-[960px] py-5 flex-1">
            <h2 class="text-white tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">My Profile</h2>

            {{-- Bagian Update Profile Information --}}
            <div class="bg-[#1e2329] rounded-xl p-6 mb-8">
                <h3 class="text-white text-xl font-semibold mb-4">Update Profile Information</h3>
                <p class="text-[#9caaba] text-sm mb-4">Update your account's profile information and email address.</p>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name" class="block text-white text-base font-medium leading-normal pb-2">Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            value="{{ old('name', $user->name) }}"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-white text-base font-medium leading-normal pb-2">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            value="{{ old('email', $user->email) }}"
                            required
                            autocomplete="username"
                        />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <p class="text-sm mt-2 text-white">
                                Your email address is unverified.
                                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    Click here to re-send the verification email.
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    A new verification link has been sent to your email address.
                                </p>
                            @endif
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#0c77f2] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                            Save
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p class="text-sm text-green-500">Saved.</p>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Bagian Update Password --}}
            <div class="bg-[#1e2329] rounded-xl p-6 mb-8">
                <h3 class="text-white text-xl font-semibold mb-4">Update Password</h3>
                <p class="text-[#9caaba] text-sm mb-4">Ensure your account is using a long, random password to stay secure.</p>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <label for="current_password" class="block text-white text-base font-medium leading-normal pb-2">Current Password</label>
                        <input
                            id="current_password"
                            name="current_password"
                            type="password"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            autocomplete="current-password"
                        />
                        @error('current_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-white text-base font-medium leading-normal pb-2">New Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            autocomplete="new-password"
                        />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-white text-base font-medium leading-normal pb-2">Confirm Password</label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal"
                            autocomplete="new-password"
                        />
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#0c77f2] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                            Save
                        </button>

                        @if (session('status') === 'password-updated')
                            <p class="text-sm text-green-500">Saved.</p>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Bagian Delete Account --}}
            <div class="bg-[#1e2329] rounded-xl p-6">
                <h3 class="text-white text-xl font-semibold mb-4">Delete Account</h3>
                <p class="text-[#9caaba] text-sm mb-4">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                </p>

                <button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-red-600 hover:bg-red-700 text-white text-sm font-bold leading-normal tracking-[0.015em]"
                >
                    Delete Account
                </button>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Delete Account --}}
    {{-- Ini membutuhkan komponen modal, yang seringkali disediakan oleh Laravel Breeze atau dibuat manual. --}}
    {{-- Untuk kesederhanaan, saya akan memberikan struktur dasar modal di sini. --}}
    <div x-cloak x-transition x-data="{ show: false }" x-show="show" id="confirm-user-deletion" style="display: none;">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity z-40"></div>
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-[#283039] text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-[#283039] px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-white" id="modal-title">
                                    Delete Account
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-[#9caaba]">
                                        Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <label for="password_delete" class="sr-only">Password</label>
                                    <input
                                        id="password_delete"
                                        name="password"
                                        type="password"
                                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#1e2329] focus:border-none h-10 placeholder:text-[#9caaba] p-4 text-sm font-normal leading-normal"
                                        placeholder="Password"
                                    />
                                    @error('password', 'userDeletion') {{-- 'userDeletion' is the error bag used by Breeze for this modal --}}
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#1e2329] px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form method="post" action="{{ route('profile.destroy') }}" class="inline">
                            @csrf
                            @method('delete')
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Delete Account
                            </button>
                        </form>
                        <button
                            type="button"
                            x-on:click="$dispatch('close-modal', 'confirm-user-deletion')"
                            class="mt-3 inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
