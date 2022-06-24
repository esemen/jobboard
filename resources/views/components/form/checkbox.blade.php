@props([
])
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input type="checkbox" {{ $attributes->merge(['class' => 'focus:ring-jh-green-400 h-4 w-4 text-jh-green-400 border-gray-300 rounded']) }}>
    </div>
    <div class="ml-3 text-sm">
        <label {{ $attributes->has('id') ? 'for="' . $attributes->get('id') . '"' : '' }} class="font-normal text-gray-700">{{ $slot }}</label>
    </div>
</div>

