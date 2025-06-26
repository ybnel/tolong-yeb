<x-app-layout>
    <div class="container mx-auto my-10 px-4 max-w-2xl">
        <h1 class="text-3xl font-bold text-white mb-6">Payment Summary</h1>

        <div class="bg-gray-800 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-white mb-4">Order Summary</h2>
            <div class="space-y-4 text-gray-300">
                <div class="flex justify-between">
                    <span>{{ $seatCount }} x Adult</span>
                    <span>Rp {{ number_format($seatCount * $pricePerSeat, 0, ',', '.') }}</span>
                </div>
                {{-- Anda bisa menambahkan logika untuk jenis tiket lain di sini --}}
                <hr class="border-gray-700">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Taxes (11%)</span>
                    <span>Rp {{ number_format($taxes, 0, ',', '.') }}</span>
                </div>
                <hr class="border-gray-700">
                <div class="flex justify-between font-bold text-white text-lg">
                    <span>Total</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('booking.pay') }}" method="POST" class="mt-8">
                @csrf
                <h2 class="text-xl font-semibold text-white mb-4">Payment Method</h2>
                <div class="space-y-4">
                    
                    <label class="flex items-center p-4 bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-600 transition">
                        <input type="radio" name="payment_method" value="credit_card" class="hidden" checked>
                        <span class="text-white flex-grow">Credit Card</span>
                        <span class="custom-radio w-5 h-5 border-2 border-gray-400 rounded-full flex items-center justify-center">
                            <span class="check-mark w-2.5 h-2.5 bg-blue-500 rounded-full hidden"></span>
                        </span>
                    </label>

                    <label class="flex items-center p-4 bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-600 transition">
                        <input type="radio" name="payment_method" value="gift_card" class="hidden">
                        <span class="text-white flex-grow">Gift Card</span>
                        <span class="custom-radio w-5 h-5 border-2 border-gray-400 rounded-full flex items-center justify-center">
                            <span class="check-mark w-2.5 h-2.5 bg-blue-500 rounded-full hidden"></span>
                        </span>
                    </label>
                    
                    <label class="flex items-center p-4 bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-600 transition">
                        <input type="radio" name="payment_method" value="paypal" class="hidden">
                        <span class="text-white flex-grow">PayPal</span>
                        <span class="custom-radio w-5 h-5 border-2 border-gray-400 rounded-full flex items-center justify-center">
                            <span class="check-mark w-2.5 h-2.5 bg-blue-500 rounded-full hidden"></span>
                        </span>
                    </label>

                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-white hover:bg-gray-200 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-300">
                        Confirm Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <style>
        /* CSS untuk membuat custom radio button */
        input[type="radio"]:checked + span + .custom-radio {
            border-color: #3b82f6; /* blue-500 */
        }
        input[type="radio"]:checked + span + .custom-radio .check-mark {
            display: block;
        }
    </style>
</x-app-layout>