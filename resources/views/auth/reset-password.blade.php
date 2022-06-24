@extends('layouts.app')
@section('content')
    <div class="flex flex-col">
        <x-layouts.page-breadcrumb-section title="Reset Password">
            Please define your new password
        </x-layouts.page-breadcrumb-section>

        <section class="w-full max-w-sm mx-auto flex-grow">
            <form method="post" action="{{ route('password.update') }}" class="flex flex-col space-y-6 mb-12">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <x-form.text-input name="email" placeholder="Email" readonly class="p-4 h-full w-full"
                                   value="{{ old('email', request()->get('email')) }}">
                    <x-slot name="icon"><i class="las la-envelope text-2xl text-gray-500"></i></x-slot>
                    @error('email')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.text-input type="password" name="password" placeholder="Password" class="p-4 h-full w-full">
                    <x-slot name="icon"><i class="las la-key text-2xl text-gray-500"></i></x-slot>
                    @error('password')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.text-input type="password" name="password_confirmation" placeholder="Password Again"
                                   class="p-4 h-full w-full">
                    <x-slot name="icon"><i class="las la-key text-2xl text-gray-500"></i></x-slot>
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.standard-button>Update password</x-form.standard-button>
            </form>
        </section>
    </div>
@endsection
