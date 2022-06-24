@extends('layouts.app')
@section('content')
    <div class="flex-grow bg-gray-100">
        @if(session()->has('success'))
            <div class="container mt-4">
                <x-alert-success>
                    {{ session('success') }}
                </x-alert-success>
            </div>
        @endif

        @if($errors->any())
            <div class="container mt-4">
                <x-alert-error>
                    {{ $errors->first() }}
                </x-alert-error>
            </div>
        @endif

        <div class="container py-4 grid grid-cols-12 gap-4 xl:grid-flow-col">
            <div
                class="px-4 py-4 shadow-md border rounded-md bg-white col-span-full sm:col-span-6 md:col-span-8 lg:col-span-9 xl:col-span-3">
                @yield('leftPanel')
            </div>

            <div
                class="px-4 py-4 shadow-md border rounded-md bg-white col-span-full sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-3 xl:col-start-10">
                @yield('rightPanel')
            </div>

            <div class="px-4 py-4 shadow-md border rounded-md bg-white col-span-full xl:col-span-6 xl:col-start-4">
                @yield('mainPanel')
            </div>
        </div>
    </div>
@endsection
