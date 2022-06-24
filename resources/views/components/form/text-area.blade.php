@props([
    'label' => null,
    'id' => null
])
<div>
    @isset($label)
        <label for="{{ $id }}" class="block text-gray-700 mb-2">
            {{ $label }}
        </label>
    @endisset
    <div class="block relative">
        <textarea
            @isset($id) id="{{ $id }}" @endisset
            {{ $attributes->except(['id', 'label'])->class("block w-full outline-none border border-gray-200 rounded-lg focus:ring-0")->class(['bg-gray-100' => $attributes->has('disabled')]) }} ></textarea>
    </div>
    <div class="text-red-600 leading-relaxed mt-2">{{ $slot }}</div>
</div>
