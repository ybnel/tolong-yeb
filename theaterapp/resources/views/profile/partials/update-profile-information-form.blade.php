{{-- Ini adalah isi dari partial --}}
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

        {{-- ... bagian verifikasi email jika ada ... --}}
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