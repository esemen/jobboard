@extends('layouts.app')
@section('content')
    <x-layouts.page-breadcrumb-section title="Company">
        Select the company to create a post
    </x-layouts.page-breadcrumb-section>

    <section class="container my-12 grid grid-cols-2 gap-6">
        @forelse($representations as $representation)
            <a href="#" class="group">
                <div class="p-8 text-gray-700 border-2 border-jh-green-400 group-hover:bg-green-100 rounded-lg flex">
                    <h3 class="text-xl text- font-extrabold">{{ $representation->company->name }}</h3>
                    <i class="las la-2x la-plus-circle"></i>
                </div>
            </a>
        @empty
            <div class="flex-grow col-span-2 px-4 py-12 text-center">
                <div class="text-xl">
                    You don't have any company to create a job post.<br/>
                    You must be authorized for a company or create a new company to create a job
                </div>
                <a href="{{ route('company.create') }}"
                   class="inline-block mt-12 px-8 py-3 bg-jh-green-400 text-white rounded-lg focus:outline-none">
                    <div class="flex items-center space-x-2">
                        <i class="las la-2x la-plus-circle"></i><span class="text-xl">Create a Company</span>
                    </div>
                </a>
            </div>
        @endforelse
    </section>
@endsection
