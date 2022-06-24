@extends('layouts.app')
@section('content')
    <div class="flex flex-col">
        <x-layouts.page-breadcrumb-section title="Login">
            Login and apply for jobs
        </x-layouts.page-breadcrumb-section>

        <section class="container py-12">
            @if(session()->has('error'))
                <div class="pb-4 text-center text-red-500">{{ session('error') }}</div>
            @endif

            <div class="grid md:grid-cols-2 max-w-5xl mx-auto md:gap-8 md:divide-x">
                <form method="post" action="{{ route('login') }}" class="flex flex-col space-y-6 px-6 md:p-0">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-form.text-input name="email" placeholder="Email" class="p-4 h-full w-full"
                                       value="{{ old('email') }}">
                        <x-slot name="icon"><i class="las la-user text-2xl text-gray-500"></i></x-slot>
                        @error('email')
                        {{ $message }}
                        @enderror
                    </x-form.text-input>

                    <x-form.text-input type="password" name="password" placeholder="Password" class="p-4 h-full w-full"
                                       value="{{ old('password') }}">
                        <x-slot name="icon"><i class="las la-key text-2xl text-gray-500"></i></x-slot>
                        @error('password')
                        {{ $message }}
                        @enderror
                    </x-form.text-input>

                    <div class="flex justify-between">
                        <x-form.checkbox name="remember" id="remember">Remember</x-form.checkbox>

                        <a href="{{ route('password.request') }}" class="text-sm">Forgot Password?</a>
                    </div>
                    @csrf
                    <x-form.standard-button>Login</x-form.standard-button>
                </form>
                <div class="flex flex-col text-center space-y-4 px-6 md:pr-0">
                    <div class="flex space-x-4 items-center">
                        <div class="flex-grow">
                            <hr/>
                        </div>
                        <p>OR</p>
                        <div class="flex-grow">
                            <hr/>
                        </div>
                    </div>
                    <a href="{{ route('social-login', 'linkedin') }}">
                        <div
                            class="px-8 py-4 relative bg-blue-800 hover:bg-blue-600 text-white rounded-lg font-semibold focus:outline-none">
                            <div
                                class="absolute inset-y-0 left-0 w-12 flex items-center text-2xl justify-center border-r border-gray-800 border-opacity-40">
                                <i class="fab fa-linkedin-in"></i></div>
                            Login with Linkedin
                        </div>
                    </a>
                    <a href="{{ route('social-login', 'google') }}">
                        <div
                            class="px-8 py-4 relative bg-red-600 hover:bg-red-500 text-white rounded-lg font-semibold focus:outline-none">
                            <div
                                class="absolute inset-y-0 left-0 w-12 flex items-center text-2xl justify-center border-r border-gray-800 border-opacity-40">
                                <i class="fab fa-google"></i></div>
                            Login with Google
                        </div>
                    </a>
                    <a href="{{ route('social-login', 'github') }}">
                        <div
                            class="px-8 py-4 relative bg-gray-600 hover:bg-gray-500 text-white rounded-lg font-semibold focus:outline-none">
                            <div
                                class="absolute inset-y-0 left-0 w-12 flex items-center text-2xl justify-center border-r border-gray-800 border-opacity-40">
                                <i class="fab fa-github"></i></div>
                            Login with Github
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
