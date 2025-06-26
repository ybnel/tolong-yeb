{{-- resources/views/auth/verify-email.blade.php --}}
<head>
  <title>Verify Email</title>
</head>
<x-app-layout>
    <div class="px-4 sm:px-10 md:px-40 flex flex-1 items-center justify-center py-5 text-center">
        <div class="layout-content-container flex flex-col w-full sm:w-[512px] py-5 max-w-[960px] flex-1">
            
            <div class="w-full max-w-md mx-auto">
                <h2 class="text-white text-3xl font-bold leading-tight mb-4">
                    {{ __('Thank you for signing up!') }}
                </h2>

                <p class="mb-4 text-base text-gray-400">
                    {{ __('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>

                {{-- Status message if a new verification link has been sent --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                    {{-- Form to Resend Verification Email --}}
                    <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500 h-12 transition-colors duration-300">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    {{-- Form to Logout --}}
                    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-xl shadow-sm text-sm font-medium text-gray-300 bg-[#283039] hover:bg-[#3b4654] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-500 h-12 transition-colors duration-300">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
