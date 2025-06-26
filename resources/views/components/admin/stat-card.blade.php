@props(['icon' => 'film', 'label' => '', 'value' => '', 'color' => 'blue'])

<div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-100">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-{{ $color }}-500 bg-opacity-25 text-{{ $color }}-400 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <use xlink:href="#icon-{{ $icon }}" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase">{{ $label }}</p>
                <p class="text-3xl font-bold">{{ $value }}</p>
            </div>
        </div>
    </div>
</div>
