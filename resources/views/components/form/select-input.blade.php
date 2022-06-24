@props([
    'label' => null,
    'id' => null,
    'items' => [],
    'keyField' => 'id',
    'valueField' => 'name',
    'value' => ''
])
<div>
    @isset($label)
        <label for="{{ $id }}" class="block text-gray-700 mb-2">
            {{ $label }}
        </label>
    @endisset
    <div class="block relative">
        <select
            @isset($id) id="{{ $id }}" @endisset
            {{ $attributes->except(['type', 'id', 'label'])->class("block w-full outline-none border border-gray-200 rounded-lg focus:ring-0")->class(['bg-gray-100' => $attributes->has('disabled')]) }}>
            @foreach($items as $item)
                <option value="{{ $item->$keyField }}" {{ $value === $item->$keyField ? 'selected="selected"' : null }}>{{ $item->$valueField }}</option>
            @endforeach
        </select>
            @isset($icon)
                <div class="absolute right-0 top-0 h-full flex items-center mr-2">
                    {{ $icon }}
                </div>
        @endisset
    </div>
    <div class="text-red-600 leading-relaxed mt-2">{{ $slot }}</div>
</div>

