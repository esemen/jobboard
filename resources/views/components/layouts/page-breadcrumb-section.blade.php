@props([
    'title' => ''
])

<div class="bg-gray-100 px-4 py-4 md:py-12">
    <div class="container md:flex md:justify-between items-center">
        <div class="flex flex-col space-y-2 md:space-y-4">
            <p class="text-3xl md:text-4xl font-semibold">{{ $title }}</p>
            <p class="text-sm md:text-base">{{ $slot }}</p>
        </div>
    </div>
</div>
