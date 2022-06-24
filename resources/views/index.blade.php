@extends('layouts.app')
@section('content')
    <!-- Search Section -->
    <section class="bg-search-section bg-cover bg-center">
        <div class="flex bg-black bg-opacity-60 py-36">
            <div class="container flex flex-col space-y-12 justify-center text-white">
                <!-- Caption -->
                <div class="flex-col text-center space-y-4 text-4xl xl:text-5xl 2xl:text-6xl">
                    <p class="font-bold">Great Job</p>
                    <p class="font-medium">Greater Talent</p>
                </div>
                <!-- Search -->
                <div class="flex space-x-2 w-full 2xl:max-w-2xl mx-auto px-2">
                    <div class="flex-grow">
                        <input
                            class="h-full w-full px-4 py-2 text-gray-600 focus:outline-none focus:ring focus:ring-jh-green-400"
                            type="text" name="search" placeholder="Search for jobs">
                    </div>
                    <div class="flex-none">
                        <button class="h-16 w-20 text-xl bg-jh-green-400"><i class="las la-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- Search Section End-->

    <!-- Popular Categories Section -->
    <section class="text-gray-700 mt-12">
        <h2 class="text-center text-3xl font-bold">Popular Categories</h2>
    </section> <!-- Popular Categories Section End -->

    <div class="text-center text-lg my-8">
        @if (Auth::guest() or Auth::user()->user_mode <> 'RECRUITER')
            Jobseeker mode
        @else
            Recruiter mode
        @endif
    </div>
@endsection
