@extends('layouts.dashboard')

@section('mainPanel')
    <x-form.section-title>Stored CVs</x-form.section-title>
    <hr class="my-2">

    @forelse($cvs as $cv)
        <form method="post" class="mb-2" action="{{ route('cv.destroy', ['cv' => $cv->id]) }}">
            @csrf
            @method('delete')
            <a href="{{ route('cv.show', ['cv' => $cv->id]) }}"><i class="fa fa-file"></i> {{ $cv->original_name }}</a>
            <button class="bg-red-500 text-white px-2 py-1" type="submit"><i class="fa fa-trash"></i></button>
        </form>
    @empty
        You don't have any stored CV
    @endforelse
    <div class="mt-8">
        <form method="post" id="cvUpload" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="file" id="fileDialogId" name="cv"/>
            </div>
            <div>
                <x-form.standard-button type="submit">Upload CV</x-form.standard-button>
            </div>
        </form>
    </div>
@endsection

@section('leftPanel')
    <x-parts.profile-avatar-box/>
@endsection

@section('rightPanel')
    <x-parts.profile-cv-summary :edit-link="false"/>
@endsection


