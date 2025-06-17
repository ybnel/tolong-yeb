{{-- Ini adalah konten untuk partial update-password-form.blade.php --}}

<h3 class="text-white text-xl font-semibold mb-4">Update Password</h3>
<p class="text-[#9caaba] text-sm mb-4">Ensure your account is using a long, random password to stay secure.</p>

<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put') {{-- Menggunakan metode PUT untuk update password --}}

    <div>
        <label for="current_password" class="block text-white text-base font-medium leading-normal pb-2">Current Password</label>
        <input
            id="current_password"
            name="current_password"
            type="password"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('current_password', 'updatePassword') border-red-500 @enderror"
            autocomplete="current-password"
        />
        @error('current_password', 'updatePassword')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-white text-base font-medium leading-normal pb-2">New Password</label>
        <input
            id="password"
            name="password"
            type="password"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('password', 'updatePassword') border-red-500 @enderror"
            autocomplete="new-password"
        />
        @error('password', 'updatePassword')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-white text-base font-medium leading-normal pb-2">Confirm Password</label>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-12 placeholder:text-[#9caaba] p-4 text-base font-normal leading-normal @error('password_confirmation', 'updatePassword') border-red-500 @enderror"
            autocomplete="new-password"
        />
        @error('password_confirmation', 'updatePassword')
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
