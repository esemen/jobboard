@extends('layouts.app')
@section('content')
    <x-layouts.page-breadcrumb-section title="Create Company"></x-layouts.page-breadcrumb-section>

    <section class="container max-w-6xl flex-grow px-8 lg:px-0">
        <form method="post" action="{{ route('company.store') }}" class="grid lg:grid-cols-2 gap-6 my-12">
            @csrf

            <x-form.text-input name="name" placeholder="Company Name" class="p-4"
                               value="{{ old('name') }}">
                <x-slot name="icon"><i class="las la-tag text-2xl text-gray-500"></i></x-slot>
                @error('name')
                {{ $message }}
                @enderror
            </x-form.text-input>

            <x-form.text-input name="email" placeholder="Contact Email" class="p-4" value="{{ old('email') }}">
                <x-slot name="icon"><i class="las la-envelope text-2xl text-gray-500"></i></x-slot>
                @error('email')
                {{ $message }}
                @enderror
            </x-form.text-input>

            <div>
                <select name="industry"
                        class="p-4 w-full block outline-none border border-gray-200 rounded-lg focus:ring">
                    <option value="">Select Industry</option>
                    @foreach($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                    @endforeach
                </select>
                <div class="text-red-600 leading-relaxed mt-2">
                    @error('industry')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <x-form.text-input name="website" placeholder="Company Website" class="p-4" value="{{ old('website') }}">
                <x-slot name="icon"><i class="las la-link text-2xl text-gray-500"></i></x-slot>
                @error('website')
                {{ $message }}
                @enderror
            </x-form.text-input>

            <x-form.standard-button class="col-span-full">Create</x-form.standard-button>
        </form>
    </section>
@endsection
