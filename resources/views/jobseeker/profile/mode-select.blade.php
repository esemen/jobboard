@extends('layouts.app')

@section('content')
    <x-layouts.page-breadcrumb-section title="Site Layout">
        Define your style
    </x-layouts.page-breadcrumb-section>

    <section class="container max-w-2xl py-12">
        <form method="post">
            <p class="text-lg text-center">Which of these describes you better</p>
            <div class="grid grid-cols-1 md:grid-cols-2 mt-8">
                @csrf
                <x-form.standard-button type="submit" name="mode" value="JOBSEEKER" class="m-2">I'm a jobseeker
                </x-form.standard-button>
                <x-form.standard-button type="submit" name="mode" value="RECRUITER" class="m-2">I'm a recruiter
                </x-form.standard-button>
            </div>

            <p class="text-sm text-center mt-4">You can change this setting later at any time.</p>
        </form>
    </section>
@endsection
