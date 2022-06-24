@extends('layouts.app')
@section('content')
    <x-layouts.page-breadcrumb-section title="Manage Companies"></x-layouts.page-breadcrumb-section>

    <section class="container mt-12 flex-grow px-8 lg:px-0 flex flex-col">
        @foreach($representations as $representation)
            <a href="#" class="group">
                <div class="p-8 text-gray-700 border border-jh-green-400 group-hover:bg-green-100 rounded-lg flex">
                    <h3 class="text-xl text- font-extrabold">{{ $representation->company->name }}</h3>
                </div>
            </a>
        @endforeach
    </section>
@endsection
