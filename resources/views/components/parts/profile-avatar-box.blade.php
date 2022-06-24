@props([
    'editLink' => true
])

<x-form.section-title>{{ auth()->user()->name }}</x-form.section-title>
<hr class="my-2"/>
<p class="text-sm mb-4">The Lord of the Rings</p>
<div class="text-center">
    <div class="inline-block h-24 w-24 rounded-full overflow-hidden bg-gray-100">
        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
    </div>
</div>
<div class="relative pt-1">
    <div class="flex mb-2 items-center justify-between">
        <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 rounded-full">
                              Profile Progress
                            </span>
        </div>
        <div class="text-right">
                            <span class="text-xs font-semibold inline-block">
                              30%
                            </span>
        </div>
    </div>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
        <div style="width:30%"
             class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
    </div>

    @if($editLink)
        <x-form.small-button-link :to="route('profile.edit')" class="block">Edit Profile</x-form.small-button-link>
    @else
        <x-form.small-button-link :to="route('dashboard')" class="block">Return to Dashboard</x-form.small-button-link>
    @endif
</div>
