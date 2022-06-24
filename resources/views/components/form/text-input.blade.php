@props([
    'label' => null,
    'id' => null,
    'type' => 'text',
])
<div>
    @isset($label)
        <label for="{{ $id }}" class="block text-gray-700 mb-2">
            {{ $label }}
        </label>
    @endisset
    <div class="block relative">
        <input
            type="{{ $type }}"
            @isset($id) id="{{ $id }}" @endisset
            {{ $attributes->except(['type', 'id', 'label'])->class("block w-full outline-none border border-gray-200 rounded-lg focus:ring-0")->class(['bg-gray-100' => $attributes->has('disabled')]) }}>

        @isset($icon)
            <div class="absolute right-0 top-0 h-full flex items-center mr-2">
                {{ $icon }}
            </div>
        @endisset
    </div>
    <div class="text-red-600 leading-relaxed mt-2">{{ $slot }}</div>
</div>

