@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center py-5 px-4">
    <div class="max-w-2xl w-full">
        <h1 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] mb-6">Payment Summary</h1>

        <div class="bg-[#1e2329] rounded-xl p-6 mb-6">
            <h3 class="text-white text-lg font-bold mb-4">Order Summary</h3>
            <div class="divide-y divide-[#283039]">
                <div class="flex justify-between py-2">
                    <span class="text-white text-base">2 x Adult</span>
                    <span class="text-white text-base">$24.00</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-white text-base">1 x Child</span>
                    <span class="text-white text-base">$10.00</span>
                </div>
                <div class="flex justify-between py-2 font-semibold">
                    <span class="text-white text-base">Subtotal</span>
                    <span class="text-white text-base">$34.00</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-white text-base">Taxes</span>
                    <span class="text-white text-base">$3.40</span>
                </div>
                <div class="flex justify-between py-2 text-xl font-bold">
                    <span class="text-white">Total</span>
                    <span class="text-white">$37.40</span>
                </div>
            </div>
        </div>

        <div class="bg-[#1e2329] rounded-xl p-6 mb-6">
            <h3 class="text-white text-lg font-bold mb-4">Payment Method</h3>
            <div class="space-y-4">
                <label class="flex items-center justify-between cursor-pointer py-2 border-b border-[#283039] last:border-b-0">
                    <span class="text-white text-base">Credit Card</span>
                    <input type="radio" name="payment_method" value="credit_card" class="form-radio h-5 w-5 text-[#0c77f2] border-[#9caaba] focus:ring-[#0c77f2]" checked>
                </label>
                <label class="flex items-center justify-between cursor-pointer py-2 border-b border-[#283039] last:border-b-0">
                    <span class="text-white text-base">Gift Card</span>
                    <input type="radio" name="payment_method" value="gift_card" class="form-radio h-5 w-5 text-[#0c77f2] border-[#9caaba] focus:ring-[#0c77f2]">
                </label>
                <label class="flex items-center justify-between cursor-pointer py-2">
                    <span class="text-white text-base">PayPal</span>
                    <input type="radio" name="payment_method" value="paypal" class="form-radio h-5 w-5 text-[#0c77f2] border-[#9caaba] focus:ring-[#0c77f2]">
                </label>
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 flex-1 bg-[#0c77f2] text-white text-base font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Confirm Payment</span>
            </button>
        </div>
    </div>
</div>
@endsection
