@props([
    'editLink' => true
])

<div>
    <x-form.section-title>CVs</x-form.section-title>
    <hr class="my-2"/>
    <div>You can add multiple CVs depending on your application and
        you can choose the right CV for the right application.
    </div>

    <div class="text-center font-bold mt-4">Stored on Jobinhood</div>

    <div class="grid grid-cols-2 mt-2 divide divide-x text-center text-sm ">
        <div>
            <div class="text-2xl">{{ auth()->user()->cvs()->count() }}</div>
            {{ Str::pluralStudly('CV', 0) }}
        </div>
        <div>
            <div class="text-2xl">0</div>
            {{ Str::plural('Cover Letter', 0) }}
        </div>
    </div>

    @if($editLink)
        <div class="mt-2">
            <x-form.small-button-link :to="route('cv.index')" class="block">Manage</x-form.small-button-link>
        </div>
    @endif

</div>
