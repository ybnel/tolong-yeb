{{-- Ini adalah konten untuk partial delete-user-form.blade.php --}}

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

{{-- Modal Konfirmasi Delete Account --}}
{{-- Membutuhkan Alpine.js agar x-data, x-show, dan x-on:click berfungsi --}}
<div x-cloak x-transition x-data="{ show: false, password: '' }" x-show="show" id="confirm-user-deletion" style="display: none;">
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
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#1e2329] focus:border-none h-10 placeholder:text-[#9caaba] p-4 text-sm font-normal leading-normal @error('password', 'userDeletion') border-red-500 @enderror"
                                    placeholder="Password"
                                    x-ref="passwordInput"
                                    x-model="password"
                                    x-on:keydown.enter="$dispatch('confirm-delete')"
                                />
                                @error('password', 'userDeletion')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#1e2329] px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <form method="post" action="{{ route('profile.destroy') }}" x-on:submit.prevent="$dispatch('close-modal', 'confirm-user-deletion'); $el.submit()" class="inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="password" x-bind:value="password"> {{-- Mengirim password dari modal --}}
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
