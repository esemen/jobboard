@extends('layouts.app')
@section('content')
    <div class="flex flex-col">
        <x-layouts.page-breadcrumb-section title="Reset Password">
            We will send a reset link to your email
        </x-layouts.page-breadcrumb-section>

        <section class="w-full max-w-sm mx-auto flex-grow">
            <form method="post" action="{{ route('password.email') }}" class="flex flex-col space-y-6 mb-12">
                @csrf
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-form.text-input name="email" placeholder="Email" class="p-4 h-full w-full"
                                   value="{{ old('email') }}">
                    <x-slot name="icon"><i class="las la-envelope text-2xl text-gray-500"></i></x-slot>
                    @error('email')
                    {{ $message }}
                    @enderror
                </x-form.text-input>
                <x-form.standard-button>Send reset link</x-form.standard-button>
            </form>
        </section>
    </div>
@endsection
