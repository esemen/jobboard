@props([
    'to' => '#'
])

<a href="{{ $to }}" {{ $attributes->class('text-sm hover:bg-gray-600 hover:text-white text-center px-8 py-2 border rounded-md font-semibold focus:outline-none') }}>
    {{ $slot }}
</a>
