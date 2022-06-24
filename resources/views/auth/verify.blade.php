@extends('layouts.app')
@section('content')
    <div class="flex flex-col">
        <x-layouts.page-breadcrumb-section title="Email Verification">
            {{ __('Before proceeding, you must verify your email') }}
        </x-layouts.page-breadcrumb-section>

        <div class="container flex-col justify-center">
            <div class="text-center py-12 leading-loose">
                {{ __('Please check your email for a verification link.') }} <br/>
                {{ __('If you did not receive the email, you can request a new one') }},
            </div>

            <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                @csrf
                <x-form.standard-button>{{ __('Please send the verification email again') }}</x-form.standard-button>

                @if (session('status') == 'verification-link-sent')
                    <div class="mt-4 font-medium text-sm text-green-600">
                        {{ __('A new email verification link has been emailed to you.') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
