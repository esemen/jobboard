@props([
    'to' => ''
])
<a href="{{ $to }}" {{ $attributes->class('flex items-center px-4 py-2 text-white hover:bg-green-700 rounded-lg focus:outline-none') }}>
    {{ $slot }}
</a>
